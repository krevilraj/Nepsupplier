<?php
/**
 * Created by PhpStorm.
 * User: Mahesh Bohara <maheshbohara0101@gmail.com>
 * Date: 10/5/2017
 * Time: 10:38 PM
 */

namespace App\Repositories\About;


interface AboutRepository {
	public function getAll();

	public function getById( $id );

	public function create( array $attributes );

	public function delete( $id );
}