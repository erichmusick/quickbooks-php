<?php 

/**
 * Check class for QuickBooks 
 * 
 * @author Keith Palmer Jr. <keith@ConsoliBYTE.com>
 * @license LICENSE.txt
 * 
 * @package QuickBooks
 * @subpackage Object
 */ 

/**
 * QuickBooks object base class
 */
QuickBooks_Loader::load('/QuickBooks/Object.php');

/**
 * Check base class
 */
QuickBooks_Loader::load('/QuickBooks/Object/Check.php');

/**
 * 
 */
class QuickBooks_Object_Check_ApplyCheckToTxn extends QuickBooks_Object_Generic
{
	/**
	 * Create a new QuickBooks_Object_Check_ApplyCheckToTxnAdd object
	 * 
	 * @param array $arr
	 */
	public function __construct($arr = array())
	{
		parent::__construct($arr);
	}

	// Path: TxnID, datatype: 
	
	/**
	 * Set the TxnID for the Check
	 * 
	 * @param string $value
	 * @return boolean
	 */
	public function setTxnID($value)
	{
		return $this->set('TxnID', $value);
	}

	/**
	 * Get the TxnID for the Check
	 * 
	 * @return string
	 */
	public function getTxnID()
	{
		return $this->get('TxnID');
	}

	public function setCreditMemoTxnApplicationID($value)
	{
		return $this->set(QUICKBOOKS_API_APPLICATIONID, $this->encodeApplicationID(QUICKBOOKS_OBJECT_CREDITMEMO, QUICKBOOKS_TXNID, $value));
	}
	
	// Path: Amount, datatype: 
	
	/**
	 * Set the Amount for the Check
	 * 
	 * @param string $value
	 * @return boolean
	 */
	public function setAmount($value)
	{
		return $this->set('Amount', $value);
	}

	/**
	 * Get the Amount for the Check
	 * 
	 * @return string
	 */
	public function getAmount()
	{
		return $this->get('Amount');
	}
	
	public function object()
	{
		return 'ApplyCheckToTxn';
	}
}

