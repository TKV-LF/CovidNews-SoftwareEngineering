<?php
    function getAll(){
        global $conn;
        $sql = "SELECT * FROM posts ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $posts = mysqli_fetch_all($result);
        return $posts;
    }

    function viewPost($id){
        global $conn;
        $sql = "SELECT * FROM posts WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $posts = mysqli_fetch_all($result);
        return $posts;
    }

    function getComment($id){
        global $conn;
        $sql = "SELECT * FROM comments WHERE id_post = '$id' ORDER BY id_cmt DESC";
        $result = mysqli_query($conn, $sql);
        $cmt = mysqli_fetch_all($result);
        return $cmt;
    }

    // function deleteRecord($id){
    //     global $conn;
    //     $sql = "DELETE FROM employees WHERE id = '$id'";
    //     $result = mysqli_query($conn, $sql);
    //     if ($result = mysqli_query($conn, $sql)){
    //         return TRUE;
    //     }
    //     else{
    //         return FALSE;
    //     }
    // }



?>
