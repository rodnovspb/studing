<?php

class DataFromBase extends DataBase {
    
    private $structure = array(
        'proxy_servers' => [
            'columns' => [
                'id'   => 'INTEGER.NOT NULL',
                'ip'   => 'TEXT.UNIQUE.NOT NULL',
                'type' => 'TEXT.NOT NULL',
                'port' => 'TEXT.NOT NULL',
            ],
            'primary_key' => 'id',
        ],
        'settings' => [
            'columns' => [
                'id'      => 'INTEGER.NOT NULL',
                'setting' => 'TEXT.UNIQUE.NOT NULL',
            ],
            'primary_key' => 'id',           
        ],
        
    );
    private $result;
    
    public function __construct() {
        $this->setNamedParam('tables', $this->structure);
        parent::__construct();        
    }
    
    private function getResultForSelectForm() {
        if(!$this->result) return FALSE;
        foreach($this->result as $val) {
            $ret[$val['name']] = $val['id'];
        }
        return $ret;
    }
    
    public function loadProxyTable() {
        return $this->result = $this->selectRows('proxy_servers');
    }
    
    public function insertProxyTable($ip, $port, $type) {
        $data['ip'] = $ip;
        $data['port'] = $port;
        $data['type'] = $type;
        return $this->insertRow('proxy_servers', $data);
    }
    
    public function deleteProxyTable($id) {
        $where['id'] = $id;
        return $this->deleteRow('proxy_servers', $where);
    }
    
    public function getCountProxies() {
        return $this->countRows('proxy_servers');
    }
    
    public function insertSettingsTable($setting) {
        $data['setting'] = $setting;
        return $this->insertRow('settings', $data);
    }
    
    public function updateSettingsTable($serialize, $id) {
        $where['id'] = $id;
        $update['setting'] = $serialize;
        return $this->updateRow('settings', $update, $where);
    }
    
    public function loadSettingsTable($id = NULL) {
        if($id) {
            $where['id'] = $id;
            $result = $this->selectRow('settings', NULL, $where);
            return $result['setting'];
        } else {
            return $this->selectRows('settings'); 
        }               
    }
    
    public function deleteSettingsTable($id) {
        $where['id'] = $id;
        return $this->deleteRow('settings', $where);
    }
    
    public function getForEditSettingsTable($id) {
        $where['id'] = $id;
        return $this->selectRow('settings', NULL, $where);
    }
    
    
    
}
