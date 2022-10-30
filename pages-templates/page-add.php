<?php
/**
 * Template Name: Add page
 */

get_header('home');
?>

<div class="wrapper">
    <div class="form-header">
        <h3>Создания обьявления</h3>
    </div>
        <form class="creation-form" id="creation-form" name="creation-form">
            <div class="form-field">
                <label>Заголовок</label>
                <input type="text" class="form-field" name="title" id="title-field" placeholder="введите заголовок" >
                <i class="fas fa-check"></i>
                <i class="fas fa-exclamation"></i>
                <small>Error</small>
            </div>

            <!-- ********************** Image container ************* -->
            <div class="main_full" id="main_full">
                <div class="container1">
                    <div class="panel">
                        <div class="button_outer">
                            <div class="btn_upload">
                                <input type="file" id="upload_file" name="image">
                                Upload Image
                            </div>
                            <div class="processing_bar"></div>
                            <div class="success_box"></div>
                        </div>
                    </div>
                    <div class="error_msg"></div>
                    <div class="uploaded_file_view" id="uploaded_view">
                        <span class="file_remove">X</span>
                    </div>
                </div>
            </div>
             <!-- ********************** Image container END************* -->

            <div class="form-field">
                <label>Email</label>
                <input type="email" class="form-field" name="email" id="email-field" placeholder="введите email">
                <i class="fas fa-check"></i>
                <i class="fas fa-exclamation"></i>
                <small>Error</small>
            </div>
            <button id="creation-form-button">Отправить</button>
        </form>


        <!-- Спасибо за заявку Popup-->
        <div class="overlay js-overlay-thank-you">
            <div class="popup js-thank-you">
                <h2>Спасибо за заявку</h2>
                <div class="close-popup js-close-thank-you"></div>
            </div>
        </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<?php
get_footer('home');?>
