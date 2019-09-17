<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//CREATE
function db_create($table=false,$data=false){
	$CI =& get_instance();
	return $CI->Crud_model->create($table,$data);
}

function db_creates($table=false,$data=false){
	$CI =& get_instance();
	return $CI->Crud_model->creates($table,$data);
}


//READ
function db_read($table=false,$where=false,$order=false){
	$CI =& get_instance();
	return $CI->Crud_model->read($table,$where,$order);
}

function count_db_read($table=false,$where=false){
	$CI =& get_instance();
	return $CI->Crud_model->count_db_read($table,$where);
}


//READS
function db_reads($table=false,$where=false,$order=false){
	$CI =& get_instance();
	return $CI->Crud_model->reads($table,$where,$order);
}

function count_db_reads($table=false,$where=false){
	$CI =& get_instance();
	return $CI->Crud_model->count_db_reads($table,$where);
}

function db_oreads($table=false,$where=false,$order=false){
	$CI =& get_instance();
	return $CI->Crud_model->oreads($table,$where,$order);
}

function count_db_oreads($table=false,$where=false){
	$CI =& get_instance();
	return $CI->Crud_model->count_db_oreads($table,$where);
}


//UPDATE
function db_update($table=false,$where=false,$update=false){
	$CI =& get_instance();
	return $CI->Crud_model->update($table,$where,$update);
}


//DELETE
function db_delete($table=false,$where=false){
	$CI =& get_instance();
	return $CI->Crud_model->delete($table,$where);
}


//QUERY
function db_query($query=false){
	$CI =& get_instance();
	return $CI->Crud_model->query($query);
}