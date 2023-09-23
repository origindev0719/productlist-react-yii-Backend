<?php

class m230918_092452_create_status_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_status', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
        ));

        $this->insert('tbl_status', array('name' => 'pending'));
        $this->insert('tbl_status', array('name' => 'done'));
        $this->insert('tbl_status', array('name' => 'progress'));
	}

	public function down()
	{
		$this->dropTable('tbl_status');
		echo "m230918_092452_create_status_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}