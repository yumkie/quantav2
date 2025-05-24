<!-- Тип кодирования данных, enctype, требуется указывать только так, как показывает пример -->
<form enctype="multipart/form-data" action="" method="POST">
    <!-- Поле MAX_FILE_SIZE требуется указывать перед полем загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Название элемента input определяет название элемента в суперглобальном массиве $_FILES -->
    Отправить файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>
<?php
$uploaddir = './photo_user/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл не содержит ошибок и успешно загрузился на сервер.\n";
} else {
    echo "Возможная атака на сервер через загрузку файла!\n";
}

echo 'Дополнительная отладочная информация:';
print_r($_FILES);

print "</pre>";

?>