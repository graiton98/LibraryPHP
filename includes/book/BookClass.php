<?php

class Book {
    private $id;
    private $isbn;
    private $name_book;
    private $category;
    private $author_id;
    private $description;
    private $stationed;
    private $image;
    
    public function __construct($isbn, $name_book, $id, $category, $author_id, $description, $stationed) {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->name_book = $name_book;
        $this->category = $category;
        $this->author_id = $author_id;
        $this->stationed = $stationed;
        $image = "img/{$this->isbn}.png";
    }
    function getId() {
        return $this->id;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getName_book() {
        return $this->name_book;
    }

    function getCategory() {
        return $this->category;
    }

    function getAuthor_id() {
        return $this->author_id;
    }

    function getDescription() {
        return $this->description;
    }

    function getStationed() {
        return $this->stationed;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setName_book($name_book) {
        $this->name_book = $name_book;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function setAuthor_id($author_id) {
        $this->author_id = $author_id;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setStationed($stationed) {
        $this->stationed = $stationed;
    }

    function setImage($image) {
        $this->image = $image;
    }

    public function __destruct() {}
    
}
