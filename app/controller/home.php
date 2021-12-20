<?php
Class home extends Controller
{
    Public function getProduct()
    {
        $product = $this->model('homeModel')->tampilProduct();
        return $product;
    }
}
