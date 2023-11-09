<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <style>
        #pagination {
            display: flex;
        }
        #pagination div {
            background-color: rgb(82, 78, 183);
            border: 2px solid rgb(82, 78, 183);
            border-radius: 100%;
            color: white;
            height: 45px;
            margin-right: 15px;
            padding: 10px;
            transition: all .4s ease-in-out;
            width: 45px;
        }
        #pagination div:hover {
            background-color: transparent;
            border: 2px solid rgb(82, 78, 183);
            color: rgb(82, 78, 183);
            cursor: pointer;
        }
    </style>
    <?php wp_head() ?>
</head>
<body>