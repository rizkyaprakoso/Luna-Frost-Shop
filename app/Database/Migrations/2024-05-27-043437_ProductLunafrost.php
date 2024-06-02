<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductLunafrost extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug_product' => [ //PRODUCT DRESS => product-dress
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'gender' => [
                'type'       => 'ENUM',
                'constraint' => ['Male', 'Female'],
            ],
            'category_name'  => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_name'   => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type'       => 'TEXT',
                'constraint' => '255',
            ],
            'size' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'price' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'stock' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('product_id', true);
        $this->forge->createTable('product_lunafrost');
    }

    public function down()
    {
        $this->forge->dropTable('product_lunafrost');
    }
}
