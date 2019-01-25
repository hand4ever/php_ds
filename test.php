<?php
class A {
	public $diffKeys = [];
	/**
	 * 测试
	 *
	 * @return void
	 */
	public function tt(){
		$infoArr = [
			['os_config_id'=>1, 'game_id'=>2, 'active_num'=>3, 'receive'=>4, 'osdk_game_id'=>5],
			['os_config_id'=>11, 'game_id'=>21, 'active_num'=>31, 'receive'=>41, 'osdk_game_id'=>51],
			['os_config_id'=>12, 'game_id'=>22, 'active_num'=>32, 'receive'=>42, 'osdk_game_id'=>52],
			];
		$checkKeys = ['os_config_id', 'game_id', 'active_num', 'receive', 'osdk_game_id'];
		foreach($infoArr as $info) {
			if ($this->isNotExistsKeys($checkKeys, $info)) {
				echo "这些key不存在:" . json_encode($this->diffKeys) . PHP_EOL;
				continue;
			}
			// if( !array_key_exists('os_config_id' , $info) || !array_key_exists('game_id' , $info) || !array_key_exists('active_num' , $info) || !array_key_exists('receive' , $info) || !array_key_exists('osdk_game_id' , $info) ){
			// 	echo "not exists some keys", PHP_EOL;
			// 	exit;
			// }
		}
	}

	/**
	 * 判断key是否存在，并将不存在的key返回到类diffKeys上
	 *
	 * @param array $keys
	 * @param array $arr
	 * @return boolean
	 */
	public function isNotExistsKeys(array $keys, array $arr)
	{
		$this->diffKeys = array_keys(array_diff_key(array_flip($keys), $arr));
		return !empty($this->diffKeys);
	}

}
$a = new A;
$a->tt();
