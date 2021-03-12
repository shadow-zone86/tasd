<?php

use yii\db\Migration;

class m190925_032429_migration25092019 extends Migration
{
    public function safeUp()
    {
        $this->createTable('table_agent', [
            'id' => $this->primaryKey(),
            'number_agent' => $this->string(255),
            'address' => $this->string(255),
            'name_agent' => $this->string(255),
        ]);
        $this->createTable('table_index', [
            'id' => $this->primaryKey(),
            'index' => $this->string(255),
            'litera' => $this->string(255),
        ]);
        $this->createTable('table_sheet', [
            'id' => $this->primaryKey(),
            'user' => $this->string(255),
            'date_time' => $this->string(255),
            'form' => $this->string(255),
            'number_form' => $this->string(255),
            'original_number' => $this->string(255),
            'made_form' => $this->string(255),
            'roll' => $this->string(255),
            'copy' => $this->string(255),
            'number_copy' => $this->string(255),
            'scene' => $this->string(255),
            'date_made' => $this->string(255),
            'date_check' => $this->string(255),
            'number_check' => $this->string(255),
            'passport' => $this->string(255),
            'agent' => $this->string(255),
            'density' => $this->string(255),
            'read' => $this->string(255),
            'na2so3' => $this->string(255),
            'ag' => $this->string(255),
            'ov' => $this->string(255),
            'ss' => $this->string(255),
            's' => $this->string(255),
            'n_s' => $this->string(255),
            'dsp' => $this->string(255),
            'k' => $this->string(255),
            'kt' => $this->string(255),
            'sk' => $this->string(255),
            'hiccupped' => $this->string(255),
            'ctencil' => $this->string(255),
            'work_ctencil' => $this->string(255),
            'defective_ctencil' => $this->string(255),
            'glue' => $this->string(255),
            'block' => $this->string(255),
            'gloset' => $this->string(255),
            'shelf' => $this->string(255),
            'cell' => $this->string(255),
            'index' => $this->string(255),
            'indication' => $this->string(255),
            'xxx' => $this->string(255),
            'number_letter' => $this->string(255),
            'prizn_document' => $this->string(255),
            'cover_letter' => $this->string(255),
            'accomp_letter' => $this->string(255),
            'fasc' => $this->string(255),
            'adress' => $this->string(255),
            'data_made' => $this->string(255),
            'nama_mkf' => $this->string(255),
            'note' => $this->string(255),
            'action' => $this->string(255),
            'key1' => $this->string(255),
            'key2' => $this->string(255),
            'key3' => $this->string(255),
            'key4' => $this->string(255),
            'key5' => $this->string(255),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('table_sheet');
        $this->dropTable('table_index');
        $this->dropTable('table_agent');
    }
}
