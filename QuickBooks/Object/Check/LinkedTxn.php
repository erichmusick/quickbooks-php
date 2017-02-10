<?php

/**
 * 
 * @author Erich Musick <mail@erichmusick.com>
 * @license LICENSE.txt 
 * 
 * @package QuickBooks
 * @subpackage Object
 */

/**
 * 
 */
QuickBooks_Loader::load('/QuickBooks/Object/Generic.php');

/**
 * 
 */
QuickBooks_Loader::load('/QuickBooks/Object/Check.php');

/**
 * 
 * 
 */
class QuickBooks_Object_Check_LinkedTxn extends QuickBooks_Object_Generic
{
	/**
	 * Create a new QuickBooks CreditMemo LinkedTxn object
	 * 
	 * @param array $arr
	 */
	public function __construct($arr = array())
	{
		parent::__construct($arr);
	}
	
	public function setTxnID($TxnID)
	{
		return $this->set('TxnID', $TxnID);
	}
	
	public function setTransactionID($TxnID)
	{
		return $this->setTxnID($TxnID);
	}
	
	public function getTxnID()
	{
		return $this->get('TxnID');
	}
	
	public function getTransactionID()
	{
		return $this->getTxnID();
	}
	
	public function setTxnApplicationID($value)
	{
		// TODO: Is it safe to use getTxnType for the id type?
		$this->set(QUICKBOOKS_API_APPLICATIONID, $this->encodeApplicationID($this->getTxnType(), QUICKBOOKS_TXNID, $value));
	}

	public function getTxnApplicationID()
	{
		return $this->extractApplicationID($this->get(QUICKBOOKS_API_APPLICATIONID));
	}
	
	public function getTxnType()
	{
		return $this->get('TxnType');
	}
	
	public function setTxnType($txnType)
	{
		return $this->set('TxnType', $txnType);
	}
	
	/**
	 * Set the reference number
	 * 
	 * @param string $str
	 * @return boolean
	 */
	public function setRefNumber($str)
	{
		return $this->set('RefNumber', $str);
	}
	
	public function getRefNumber()
	{
		return $this->get('RefNumber');
	}
	
	public function setLinkType($str)
	{
		return $this->set('LinkType', $str);
	}
	
	public function getLinkType()
	{
		return $this->get('LinkType');
	}
	
	public function getAmount()
	{
		return $this->getAmountType('Amount');
	}
	
	public function setAmount($amount)
	{
		return $this->setAmountType('Amount', $amount);
	}
	
	/**
	 * 
	 * 
	 * @return boolean
	 */
	protected function _cleanup()
	{
		return true;
	}
	
	/**
	 * 
	 */
	public function asArray($request, $nest = true)
	{
		$this->_cleanup();
		
		return parent::asArray($request, $nest);
	}
	
	public function asXML($root = null, $parent = null, $object = null)
	{
		$this->_cleanup();
		
		if (is_null($object))
		{
			$object = $this->_object;
		}
		
		switch ($parent)
		{
			case QUICKBOOKS_ADD_CHECK:
				$root = null;
				$parent = null;
				break;
			case QUICKBOOKS_MOD_CHECK:
				$root = null;
				$parent = null;
				break;
		}
		
		return parent::asXML($root, $parent, $object);
	}
	
	/**
	 * 
	 * 
	 * @param boolean $todo_for_empty_elements	A constant, one of: QUICKBOOKS_XML_XML_COMPRESS, QUICKBOOKS_XML_XML_DROP, QUICKBOOKS_XML_XML_PRESERVE
	 * @param string $indent
	 * @param string $root
	 * @return string
	 */
	public function asQBXML($request, $todo_for_empty_elements = QUICKBOOKS_OBJECT_XML_DROP, $indent = "\t", $root = null)
	{
		$this->_cleanup();
		
		return parent::asQBXML($request, $todo_for_empty_elements, $indent, $root);
	}
	
	/**
	 * Tell the type of object this is
	 * 
	 * @return string
	 */
	public function object()
	{
		return 'LinkedTxn';
	}
}
