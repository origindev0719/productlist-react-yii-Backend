<?php

class m230918_092542_create_product_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_product', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'price' => 'float NOT NULL',
            'count' => 'integer NOT NULL',
            'status_id' => 'integer NOT NULL',
			'created_at' => 'datetime DEFAULT NULL',
			'updated_at' => 'datetime DEFAULT NULL',
        ));

        // Add a foreign key for status_id
        $this->addForeignKey('fk_product_status', 'tbl_product', 'status_id', 'tbl_status', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		$this->dropTable('tbl_product');
		echo "m230918_092542_create_product_table does not support migration down.\n";
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