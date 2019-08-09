<?php
 Namespace Digi\Customerattributenew\Controller\Customer;
 use Magento\Framework\App\Action\Context;


class Save extends \Magento\Framework\App\Action\Action
{
	
protected $customerRepository;
protected $_session;


 public function __construct(
		Context $context,
		\Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
		\Magento\Customer\Model\Session $session
		


		) {
		$this->customerRepository = $customerRepository;
		$this->_session = $session;
	

		parent::__construct($context);
		}


	
	public function execute()
    {
		
		$customerId=$this->_session->getCustomer()->getId();

		$customer = $this->customerRepository->getById($customerId);


		$customer->setFirstname($customer->getFirstName());
		$customer->setLastname($customer->getLastName());
		$customer->setEmail($customer->getEmail());

		$customer->setCustomAttribute('customstatus',$this->getRequest()->getParam('customstatus'));

		$this->customerRepository->save($customer);

		$this->messageManager->addSuccessMessage(
		__('Status Updated')
		);
		$resultRedirect = $this->resultRedirectFactory->create();
		$resultRedirect->setPath('customerattributenew/customer/status');
		return $resultRedirect;
}
		
	
}
