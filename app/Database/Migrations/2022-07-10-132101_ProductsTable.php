<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_name' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            // 'category_id' => [
            //     'type' => 'int',
            //     'constraint' => 11,
            //     'unsigned' => true,
            // ],
            'price' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'description' => [
                'type' => 'mediumtext',
            ],
            'photo' => [
                'type' => 'text',
            ],
            'qty' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addPrimaryKey('product_id');

        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
