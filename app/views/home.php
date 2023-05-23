<?php require APPROOT . '/views/inc/head.php'?>
<section class="section">
    <div class="container">
        <div class="table__wrapper">
            <h2 class="title">Home page</h2>

            <table class="table">
                <thead class="table__head">
                    <tr class="table__header">
                        <th class="table__header-cell">First Name</th>
                        <th class="table__header-cell">Last Name</th>
                        <th class="table__header-cell">Email</th>
                        <th class="table__header-cell table__text-center">Edit</th>
                        <th class="table__header-cell table__text-center">Delete</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                    <?php foreach($data['users'] as $key=>$value): ?>

                    <tr class="table__row" id="table_row<?php echo $key?>">
                        <td data-label="First name" class="table__row-cell" id="first_name_cell<?php echo $key?>">
                            <span
                                id="first_name_span<?php echo $key?>"><?php echo $data['users'][$key]['first_name'] ?></span>
                        </td>
                        <td data-label="Last name" class="table__row-cell" id="last_name_cell<?php echo $key?>">
                            <span
                                id="last_name_span<?php echo $key?>"><?php echo $data['users'][$key]['last_name'] ?></span>
                        </td>
                        <td data-label="Email" class="table__row-cell" id="email_cell<?php echo $key?>">
                            <span id="email_span<?php echo $key?>"><?php echo $data['users'][$key]['email'] ?></span>
                        </td>

                        <td data-label="Edit" class="table__row-cell table__text-center table__text-blue">

                            <button class="" id="edit_button<?php echo $key?>" onclick="editRow('<?php echo $key?>')"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="" id="save_button<?php echo $key?>"
                                onclick="saveEdit('<?php echo $key?>','<?php echo $data['users'][$key]['id']?>')"
                                style="display:none"><i class="bi bi-check2"></i></button>
                        </td>
                        <td data-label="Delete" class="table__row-cell table__text-center table__text-red">
                            <button
                                onclick="displayPopup('<?php echo $key?>', '<?php echo $data['users'][$key]['id']?>')"
                                class="" id="delete_button<?php echo $key?>"><i class="bi bi-trash3"></i></button>
                            <button id="cancel_button<?php echo $key?>" class="" style="display:none"
                                onclick="cancelEditRow('<?php echo $key?>')"><i class="bi bi-x-lg"></i></button>
                        </td>
                    </tr>
                    <span id="first_name_error<?php echo $key?>" class="table__error"></span>
                    <span id="last_name_error<?php echo $key?>" class="table__error"></span>
                    <span id="email_error<?php echo $key?>" class="table__error"></span>
                    <?php endforeach; ?>
                </tbody>

            </table>


        </div>



    </div>
</section>



<?php require APPROOT . '/views/inc/popup.php'?>
<?php require APPROOT . '/views/inc/loader.php'?>
<?php require APPROOT . '/views/inc/footer.php'?>