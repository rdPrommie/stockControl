<?php

class _REQUESTHandler {
	
	const POST						= 'post';
	const GET						= 'get';
	const REQUEST					= 'request';
	const COOKIE					= 'cookie';
	const FILES						= 'files';
	const ENV						= 'env';
	const GLOBALS					= 'globals';
	
	private static $request			= array();
	private static $hibak			= array();
	private static $hianyzo			= array();
	private static $ures			= array();
	
	public static function beallit($minta, $forras = self::REQUEST) {
		$forras		= self::setForras($forras);
		$request	= new REQUESTszuro($forras, $minta);
		$request->beallit();
		self::setREQUEST($request->getREQUEST());
		self::setHibak($request->getHibak());
		self::setHianyzo($request->getHianyzo());
		self::setUres($request->getUres());
		unset($request);
	}
	
	private static function setForras($forras) {
		switch ($forras) {
			default:
			case self::REQUEST: 
				$kimenet = $_REQUEST; 
				break;
			case self::POST: 
				$kimenet = $_POST; 
				break;
			case self::GET: 
				$kimenet = $_GET; 
				break;
			case self::COOKIE: 
				$kimenet = $_COOKIE; 
				break;
			case self::FILES: 
				$kimenet = $_FILES; 
				break;
			case self::ENV: 
				$kimenet = $_ENV; 
				break;
			case self::GLOBALS: 
				$kimenet = $GLOBALS;			
				break;
		}
		return $kimenet;
	}
	
	private static function setREQUEST($request) {
		foreach ($request as $requestKey => $requestValue) {
			self::$request[$requestKey] = $requestValue;
		}
	}
	
	private static function setHibak($hibak) {
		foreach ($hibak as $hiba) {
			if (!in_array($hiba, self::$hibak)) {
				self::$hibak[] = $hiba;
			}
		}
	}
	
	private static function setHianyzo($hianyzok) {
		foreach ($hianyzok as $hianyzo) {
			if (!in_array($hianyzo, self::$hianyzo)) {
				self::$hianyzo[] = $hianyzo;
			}
		}
	}
	
	private static function setUres($uresek) {
		foreach ($uresek as $ures) {
			if (!in_array($ures, self::$ures)) {
				self::$ures[] = $ures;
			}
		}
	}
	
	public static function getREQUEST() {
		return self::$request;
	}
	
	public static function getHibak() {
		return self::$hibak;
	}
	
	public static function isHibas($mezonev) {
		return in_array($mezonev, self::$hibak);
	}
	
	public static function getHianyzo() {
		return self::$hianyzo;
	}
	
	public static function isHianyzo($mezonev) {
		return in_array($mezonev, self::$hianyzo);
	}
	
	public static function getUres() {
		return self::$ures;
	}
	
	public static function isUres($mezonev) {
		return in_array($mezonev, self::$ures);
	}
	
	public static function Tarolo($mezonev) {
		return isset(self::$request[$mezonev]) ? self::$request[$mezonev] : FALSE;
	}
	
	public static function getData($mezonev, $tipus, $forras = self::REQUEST) {
		$minta = array($mezonev => $tipus);
		_REQUESTHandler::beallit($minta, $forras);
		return isset(self::$request[$mezonev]) ? self::$request[$mezonev] : FALSE;
	}
	
}