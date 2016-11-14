<?php

namespace App\Classes;

/**
 * 所有Config文件取值统一入口文件
 * @class Config
 */
class Config
{
	//不需要过滤的键名
	private static $safeKey = array('configExt');
	private $configFile;
    private $config;
    /**
     * @brief 初始化对应的config文件
     * @param String $config config文件名
     */
    public function __construct($config)
    {
        $this->initConfig($config);
    }

    /**
     * @brief 设定Config文件
     * @param String $config config文件名
     */
    public function setConfig($config)
    {
        $this->initConfig($config);
    }

    /**
     * @brief 获取全部的config信息
     */
    public function getInfo()
    {
    	return $this->config;
    }

    /**
     * @brief  初始化对应的config文件
     * @param String $config config文件名
     * @return Array 或者为null
     */
    private function initConfig($config)
    {
        if(config('site.configExt') !== NULL && isset(config('site.configExt')[$config]))
        {
        	$this->configFile = config_path().DIRECTORY_SEPARATOR.config('site.configExt')[$config];
        	$this->config     = require($this->configFile);
        }
        else
        	$this->config = null;
    }

    /**
     * @brief 取得当前Config文件下的对应变量
     * @param String $name 变量名
     * @return mixed
     * @note 此函数可自由扩展自己对应的默认值
     */
    public function __get($name)
    {
        if(isset($this->config[$name]))
        {
            return $this->config[$name];
        }
        return '';
    }

    /**
     * @brief 取得当前Config文件下的对应变量
     * @param String $name 变量名
     * @return mixed
     * @note 此函数可自由扩展自己对应的默认值
     */
    public function write($inputArray)
    {
    	return self::edit($this->configFile , $inputArray);
    }

	/**
	 * @brief 修改配置文件信息
	 * @param string 配置文件名
	 * @param array  写入的配置内容 key:配置信息里面key值; value:配置信息里面的value值
	 * @return boolean
	 */
	public static function edit($configFile,$inputArray)
	{
		//安全过滤要写入文件的内容
		foreach($inputArray as $key => $val)
		{
			if(!in_array($key,self::$safeKey))
			{
				$inputArray[$key] = addslashes($val);
			}
		}

		$configStr = "";

		//读取配置信息内容
		if(file_exists($configFile))
		{
			$configStr   = file_get_contents($configFile);
			$configArray = require($configFile);
		}

		if(trim($configStr)=="")
		{
			$configStr   = "<?php\r\n return array( \r\n);?>";
			$configArray = array();
		}

		$inputArray = array_merge($configArray,$inputArray);
		$configData = var_export($inputArray,true);
		$configStr = "<?php\r\n return {$configData}?>";

		//写入配置文件
		$writeResult = file_put_contents($configFile,$configStr);
		return $writeResult;
	}
}