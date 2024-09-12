<?php

    // 1. connect to Database faster
    $database = connectToDB();

    // 2. get all the data from the form using $_POST
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    /* 
        3. error checking
        - make sure all the fields are not empty
        - make sure the password is match
        - make sure the password length is at least 8 characters
        
    */
    if ( empty( $title ) || empty( $content ) ) {
        setError( "All the fields are required.", '/manage-posts-add' );
    }

            // create the a new post
            // sql command (recipe)
            $sql = "INSERT INTO posts (`title`,`content`,`user_id`) VALUES (:title, :content, :user_id)";
            // prepare (put everything into the bowl)
            $query = $database->prepare( $sql );
            // execute (cook it)
            $query->execute([
                'title' => $title,
                'content' => $content,
                'user_id' => $_SESSION['user']['id']
            ]);
        
        // 5. redireact back to /manage-users page
        header("Location: /manage-posts");
        exit;
    
