<footer>

</footer>
<?php 
    $url = get_stylesheet_directory_uri()."/api/data.json"; 
    $dataUrl = file_get_contents($url);
?>
<?php wp_footer(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready( function() {
        var url = <?php echo $dataUrl; ?>;
        
        var currentPage = 1;
        var recordsPerPage = 5;

        function loadData() {
            $.ajax({
                type: "post",
                url: `${window.location.origin}/wp-admin/admin-ajax.php`,
                data: {
                    action: "my_custom_function",
                    dataJson: url,
                    currentPage: currentPage,
                    recordsPerPage: recordsPerPage
                },
                complete: function(response) {
                   
                    $("#bodyTable").html(response.responseText);
                  
                    var totalPages = Math.ceil(url["usuarios"].length / recordsPerPage);
                    var paginationHtml = '';

                    for (var i = 1; i <= totalPages; i++) {
                        paginationHtml += '<div class="pagination-link text-center';
                        if (i === currentPage) {
                            paginationHtml += ' active';
                        }
                        paginationHtml += '">' + i + '</div>';
                    }

                    $('#pagination').html(paginationHtml);

                }
            });
        }

        $(document).on('click', '.pagination-link', function() {
            currentPage = parseInt($(this).text());
            loadData();
        });

        loadData();

        $("#userForm").on("submit", function (event) {
            
            event.preventDefault();

            $("#user").on("keyup", function() {

                var input = $(this).val();

                if( input != "") {
                    $.ajax({
                        type: "post",
                        url: `${window.location.origin}/wp-admin/admin-ajax.php`,
                        data: {
                            action: "filter_data",
                            input: input,
                            dataJson: url
                        },
                        complete: function( response ) {
                            $("#bodyTable").html(response.responseText);
                        }
                    });
                }

            });

        });
    } );
</script>
</body>
</html>