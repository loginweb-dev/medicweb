<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
class DataRowsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        // \DB::table('data_rows')->delete();
        
        // \DB::table('data_rows')->insert(array (
        //     0 => 
        //     array (
        //         'id' => 1,
        //         'data_type_id' => 1,
        //         'field' => 'id',
        //         'type' => 'number',
        //         'display_name' => 'ID',
        //         'required' => 1,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 1,
        //     ),
        //     1 => 
        //     array (
        //         'id' => 2,
        //         'data_type_id' => 1,
        //         'field' => 'name',
        //         'type' => 'text',
        //         'display_name' => 'Nombre',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => NULL,
        //         'order' => 2,
        //     ),
        //     2 => 
        //     array (
        //         'id' => 3,
        //         'data_type_id' => 1,
        //         'field' => 'email',
        //         'type' => 'text',
        //         'display_name' => 'Correo Electrónico',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => NULL,
        //         'order' => 3,
        //     ),
        //     3 => 
        //     array (
        //         'id' => 4,
        //         'data_type_id' => 1,
        //         'field' => 'password',
        //         'type' => 'password',
        //         'display_name' => 'Constraseña',
        //         'required' => 1,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 4,
        //     ),
        //     4 => 
        //     array (
        //         'id' => 5,
        //         'data_type_id' => 1,
        //         'field' => 'remember_token',
        //         'type' => 'text',
        //         'display_name' => 'Token de Recuerdo',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 5,
        //     ),
        //     5 => 
        //     array (
        //         'id' => 6,
        //         'data_type_id' => 1,
        //         'field' => 'created_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Creado',
        //         'required' => 0,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 6,
        //     ),
        //     6 => 
        //     array (
        //         'id' => 7,
        //         'data_type_id' => 1,
        //         'field' => 'updated_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Actualizado',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 7,
        //     ),
        //     7 => 
        //     array (
        //         'id' => 8,
        //         'data_type_id' => 1,
        //         'field' => 'avatar',
        //         'type' => 'image',
        //         'display_name' => 'Avatar',
        //         'required' => 0,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => NULL,
        //         'order' => 8,
        //     ),
        //     8 => 
        //     array (
        //         'id' => 9,
        //         'data_type_id' => 1,
        //         'field' => 'user_belongsto_role_relationship',
        //         'type' => 'relationship',
        //         'display_name' => 'Rol',
        //         'required' => 0,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 0,
        //         'details' => '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsTo","column":"role_id","key":"id","label":"display_name","pivot_table":"roles","pivot":0}',
        //         'order' => 10,
        //     ),
        //     9 => 
        //     array (
        //         'id' => 10,
        //         'data_type_id' => 1,
        //         'field' => 'user_belongstomany_role_relationship',
        //         'type' => 'relationship',
        //         'display_name' => 'Roles',
        //         'required' => 0,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 0,
        //         'details' => '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsToMany","column":"id","key":"id","label":"display_name","pivot_table":"user_roles","pivot":"1","taggable":"0"}',
        //         'order' => 11,
        //     ),
        //     10 => 
        //     array (
        //         'id' => 11,
        //         'data_type_id' => 1,
        //         'field' => 'settings',
        //         'type' => 'hidden',
        //         'display_name' => 'Settings',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 12,
        //     ),
        //     11 => 
        //     array (
        //         'id' => 12,
        //         'data_type_id' => 2,
        //         'field' => 'id',
        //         'type' => 'number',
        //         'display_name' => 'ID',
        //         'required' => 1,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 1,
        //     ),
        //     12 => 
        //     array (
        //         'id' => 13,
        //         'data_type_id' => 2,
        //         'field' => 'name',
        //         'type' => 'text',
        //         'display_name' => 'Nombre',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => NULL,
        //         'order' => 2,
        //     ),
        //     13 => 
        //     array (
        //         'id' => 14,
        //         'data_type_id' => 2,
        //         'field' => 'created_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Creado',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 3,
        //     ),
        //     14 => 
        //     array (
        //         'id' => 15,
        //         'data_type_id' => 2,
        //         'field' => 'updated_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Actualizado',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 4,
        //     ),
        //     15 => 
        //     array (
        //         'id' => 16,
        //         'data_type_id' => 3,
        //         'field' => 'id',
        //         'type' => 'number',
        //         'display_name' => 'ID',
        //         'required' => 1,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 1,
        //     ),
        //     16 => 
        //     array (
        //         'id' => 17,
        //         'data_type_id' => 3,
        //         'field' => 'name',
        //         'type' => 'text',
        //         'display_name' => 'Nombre',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => NULL,
        //         'order' => 2,
        //     ),
        //     17 => 
        //     array (
        //         'id' => 18,
        //         'data_type_id' => 3,
        //         'field' => 'created_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Creado',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 3,
        //     ),
        //     18 => 
        //     array (
        //         'id' => 19,
        //         'data_type_id' => 3,
        //         'field' => 'updated_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Actualizado',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => NULL,
        //         'order' => 4,
        //     ),
        //     19 => 
        //     array (
        //         'id' => 20,
        //         'data_type_id' => 3,
        //         'field' => 'display_name',
        //         'type' => 'text',
        //         'display_name' => 'Nombre a Mostrar',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => NULL,
        //         'order' => 5,
        //     ),
        //     20 => 
        //     array (
        //         'id' => 21,
        //         'data_type_id' => 1,
        //         'field' => 'role_id',
        //         'type' => 'text',
        //         'display_name' => 'Rol',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => NULL,
        //         'order' => 9,
        //     ),
        //     21 => 
        //     array (
        //         'id' => 22,
        //         'data_type_id' => 4,
        //         'field' => 'id',
        //         'type' => 'text',
        //         'display_name' => 'Id',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => '{}',
        //         'order' => 1,
        //     ),
        //     22 => 
        //     array (
        //         'id' => 23,
        //         'data_type_id' => 4,
        //         'field' => 'name',
        //         'type' => 'text',
        //         'display_name' => 'Name',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => '{}',
        //         'order' => 2,
        //     ),
        //     23 => 
        //     array (
        //         'id' => 24,
        //         'data_type_id' => 4,
        //         'field' => 'description',
        //         'type' => 'text',
        //         'display_name' => 'Description',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => '{}',
        //         'order' => 3,
        //     ),
        //     24 => 
        //     array (
        //         'id' => 25,
        //         'data_type_id' => 4,
        //         'field' => 'icon',
        //         'type' => 'text',
        //         'display_name' => 'Icon',
        //         'required' => 1,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 1,
        //         'add' => 1,
        //         'delete' => 1,
        //         'details' => '{}',
        //         'order' => 4,
        //     ),
        //     25 => 
        //     array (
        //         'id' => 26,
        //         'data_type_id' => 4,
        //         'field' => 'created_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Created At',
        //         'required' => 0,
        //         'browse' => 1,
        //         'read' => 1,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => '{}',
        //         'order' => 5,
        //     ),
        //     26 => 
        //     array (
        //         'id' => 27,
        //         'data_type_id' => 4,
        //         'field' => 'updated_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Updated At',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => '{}',
        //         'order' => 6,
        //     ),
        //     27 => 
        //     array (
        //         'id' => 28,
        //         'data_type_id' => 4,
        //         'field' => 'deleted_at',
        //         'type' => 'timestamp',
        //         'display_name' => 'Deleted At',
        //         'required' => 0,
        //         'browse' => 0,
        //         'read' => 0,
        //         'edit' => 0,
        //         'add' => 0,
        //         'delete' => 0,
        //         'details' => '{}',
        //         'order' => 7,
        //     ),
        // ));
        
        $userDataType = DataType::where('slug', 'users')->firstOrFail();
        $menuDataType = DataType::where('slug', 'menus')->firstOrFail();
        $roleDataType = DataType::where('slug', 'roles')->firstOrFail();

        $specialityDataType = DataType::where('slug', 'specialities')->firstOrFail();
        $PageDataType = DataType::where('slug', 'pages')->firstOrFail();
        $BlockDataType = DataType::where('slug', 'blocks')->firstOrFail();

        $count = 1;
        $dataRow = $this->dataRow($userDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'email');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.email'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'password');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'password',
                'display_name' => __('voyager::seeders.data_rows.password'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'remember_token');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.remember_token'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'avatar');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => __('voyager::seeders.data_rows.avatar'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'user_belongsto_role_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('voyager::seeders.data_rows.role'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\Role',
                    'table'       => 'roles',
                    'type'        => 'belongsTo',
                    'column'      => 'role_id',
                    'key'         => 'id',
                    'label'       => 'display_name',
                    'pivot_table' => 'roles',
                    'pivot'       => 0,
                ],
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'user_belongstomany_role_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Roles',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\Role',
                    'table'       => 'roles',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'display_name',
                    'pivot_table' => 'user_roles',
                    'pivot'       => '1',
                    'taggable'    => '0',
                ],
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'settings');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'Settings',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $count = 1;
        $dataRow = $this->dataRow($menuDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $count = 1;
        $dataRow = $this->dataRow($roleDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'display_name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.display_name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'role_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.role'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $count++,
            ])->save();
        }

        $count = 1;
        $dataRow = $this->dataRow($specialityDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($specialityDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Nombre',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($specialityDataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Descripcion',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($specialityDataType, 'icon');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Iconos',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($specialityDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $dataRow = $this->dataRow($specialityDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }

        $count=1;
        $dataRow = $this->dataRow($PageDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Nombre',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details'      => [
                    'display'   => [
                        'width'  => '6',
                    ],
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Slug',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'slugify' => [
                        'origin' => 'name',
                        'forceUpdate' => true,
                    ],
                    'display'   => [
                        'width'  => '6',
                    ],
                ],
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Descripcion',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'direction');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Direccion',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Image',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details'      => [
                    'display'   => [
                        'width'  => '6',
                    ],
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'details');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'code_editor',
                'display_name' => 'Json',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'user_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'Traking',
                'display_name' => 'Trackin User',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'display'   => [
                        'width'  => '3',
                    ],
                ],
                'order'        => $count++
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($PageDataType, 'deleted_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'deleted_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        //pages------------------------------

        




        //Blocks------------------------------
        //-----------------------------------
        $count = 1;
        $dataRow = $this->dataRow($BlockDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
                'details' => [
                    'display' => [
                        'width' => 6
                    ]
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'page_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'page_id',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details' => [
                    'display' => [
                        'width' => 6
                    ]
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'block_belongsto_page_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Pagina',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'display' => [
                        'width' => 6
                    ],
                    'model'       => 'App\\Page',
                    'table'       => 'pages',
                    'type'        => 'belongsTo',
                    'column'      => 'page_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'pages',
                    'pivot'       => 0,
                ],
                'order'        =>$count++,
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'type');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Tipo',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details' => [
                    'display' => [
                        'width' => 6
                    ],
                    "options" => [
                        "dinamyc-data" => "Datos Dinamicos",
                        "controller" => "Controlador"
                    ]
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Nombre',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details' => [
                    'display' => [
                        'width' => 6
                    ]
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Titulo',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details' => [
                    'display' => [
                        'width' => 6
                    ]
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'position');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => 'Lugar',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details' => [
                    'display' => [
                        'width' => 6
                    ]
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Descripcion',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details' => [
                    'display' => [
                        'width' => 6
                    ]
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'details');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'code_editor',
                'display_name' => 'Details',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => $count++,
                'details' => [
                    'display' => [
                        'width' => 12
                    ]
                ]
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        $dataRow = $this->dataRow($BlockDataType, 'deleted_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'deleted_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $count++,
            ])->save();
        }
        //Blocks------------------------------



    }

    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }

}