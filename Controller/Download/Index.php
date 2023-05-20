<?php

namespace Legendaaary\CartToCSV\Controller\Download;

use Magento\Backend\App\Response\Http\FileFactory;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\File\Csv;
use Psr\Log\LoggerInterface;

class Index implements HttpGetActionInterface
{
    private string $FILE_NAME = "cart.csv";
    private array $CSV_HEADER = ["sku", "name", "price", "quantity", "row_total"];
    private CheckoutSession $checkoutSession;
    private FileFactory $fileFactory;
    private DirectoryList $directoryList;
    private Csv $csv;

    private LoggerInterface $logger;


    public function __construct(
        CheckoutSession $checkoutSession,
        FileFactory     $fileFactory,
        DirectoryList   $directoryList,
        Csv             $csv,
        LoggerInterface $logger)
    {
        $this->checkoutSession = $checkoutSession;
        $this->fileFactory = $fileFactory;
        $this->directoryList = $directoryList;
        $this->csv = $csv;
        $this->logger = $logger;
    }


    public function execute(): ResultInterface|ResponseInterface
    {

        try {
            $cartData = $this->getCartData();
        } catch (NoSuchEntityException|LocalizedException $e) {
            $this->logger->info($e->getMessage());
        }

        if (!empty($cartData)) {
            try {
                $fileContent = $this->createCsv($cartData);
            } catch (FileSystemException $e) {
                $this->logger->error($e->getMessage());
            }
        }
        return $this->fileFactory->create(
            $this->FILE_NAME,
            $fileContent ?? "",
            DirectoryList::VAR_DIR);
    }

    /**
     * @return array
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    private function getCartData(): array
    {
        $quote = $this->checkoutSession->getQuote();
        $cartData = [];

        foreach ($quote->getItems() as $item) {
            $cartData[] = [
                $item->getSku(),
                $item->getName(),
                $item->getPrice(),
                $item->getQty(),
                $item->getRowTotal()
            ];
        }

        return $cartData;
    }

    /**
     * @throws FileSystemException
     */
    private function createCsv($cartData): array
    {
        $varPath = $this->directoryList->getPath(DirectoryList::VAR_DIR);
        $filePath = $varPath . '/export/' . $this->FILE_NAME;


        $this->csv->appendData($filePath, array_merge([$this->CSV_HEADER], $cartData));

        return [
            'type' => 'filename',
            'value' => $filePath,
            'rm' => true
        ];

    }
}
