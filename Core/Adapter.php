<?php 
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @alias : Mamam YUk - dadang gitu loh
* @return {Adapter}
* Polymorphism
**/

namespace Core;

interface Adapter
{
    public function index();
    public function all();
    public function create();
    public function update();
    public function delete();
}
