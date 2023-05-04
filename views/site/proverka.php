<div class="menu">
<?php
foreach ($menu as $men){

    echo '<div class="block">';
    echo '<p  class="p">Название: ' . $men->nameIng. '</p>';
    echo '<p  class="p">Вес: ' . $men->ves. '</p>';
    echo '<p  class="p">Цена: ' . $men->price. '</p>';
    echo '<p  class="p">Описание: ' . $men->description. '</p>';
    echo '</div>';

}
?>
</div>
