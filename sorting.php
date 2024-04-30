<?php

class PriorityQueue {//Это начало определения класса PriorityQueue.
    private $heap;//объявление приватной переменной $heap для хранения элементов очереди с приоритетами.

    public function __construct() {// конструктор класса PriorityQueue. Конструктор выполняется при создании нового объекта этого класса.
        $this->heap = array();//строка инициализирует свойство $heap как пустой массив при создании объекта класса.
    }

    public function isEmpty() {//метод класса PriorityQueue, который проверяет, пуста ли очередь с приоритетами.
        return empty($this->heap);//строка возвращает true, если массив $heap пуст, и false в противном случае.
    }

    public function enqueue($value, $priority) {//метод класса PriorityQueue, который добавляет элемент в очередь с приоритетами.
        $element = array('value' => $value, 'priority' => $priority);
        //Создает ассоциативный массив $element, который представляет элемент с его значением и приоритетом.
        $this->heap[] = $element;//Добавляет элемент в конец массива $heap, представляя новый элемент в очереди.
        $this->heapifyUp();//Вызывает приватный метод heapifyUp() для пересортировки очереди после добавления элемента.
    }

    public function dequeue() { //меьод класса PriorityQueue, который извлекает элемент с наивысшим приоритетом из очереди.
        if ($this->isEmpty()) {//Проверяет, пуста ли очередь, и возвращает null, если она пуста.
            return null;
        }

        $this->swap(0, count($this->heap) - 1);//Вызывает приватный метод swap() для замены первого элемента и последнего элемента в очереди.
        $element = array_pop($this->heap);//Извлекает последний элемент из очереди и сохраняет его в переменной $element.
        $this->heapifyDown();//Вызывает приватный метод heapifyDown() для пересортировки очереди после удаления элемента.
        return $element['value'];// Возвращает значение извлеченного элемента.
    }

    private function heapifyUp() {//приватный метод класса PriorityQueue, который пересортирует очередь вверх (в сторону корня) после добавления нового элемента.
        $index = count($this->heap) - 1;//устанавливает начальный индекс для пересортировки в индекс последнего добавленного элемента.

        while ($index > 0) {//начало цикла, который выполняется до тех пор, пока мы не достигнем корневого элемента.
            $parentIndex = ($index - 1) >> 1;//Вычисляет индекс родительского элемента на основе индекса текущего элемента.

            if ($this->heap[$index]['priority'] > $this->heap[$parentIndex]['priority']) {//Сравнивает приоритет текущего элемента с приоритетом его родительского элемента.
                $this->swap($index, $parentIndex);// Если приоритет текущего элемента больше приоритета родительского элемента, происходит обмен местами элементов.
                $index = $parentIndex;//Обновляет индекс текущего элемента на индекс его родителя для продолжения пересортировки вверх.
            } else {
                break;//Если приоритет текущего элемента не больше приоритета родителя, цикл завершается.
            }
        }
    }

    private function heapifyDown() {
        $index = 0; // Устанавливаем индекс текущего элемента в корень (вершину) кучи
        $heapSize = count($this->heap); // Вычисляем текущий размер кучи

        while (true) { // Запускаем бесконечный цикл для выполнения нисходящей пирамидальной сортировки
            $leftChildIndex = 2 * $index + 1; // Вычисляем индекс левого потомка
            $rightChildIndex = 2 * $index + 2; // Вычисляем индекс правого потомка
            $largestIndex = $index; // Индекс элемента с наибольшим приоритетом, начально устанавливаем текущий индекс

            // Проверяем, существует ли левый потомок и его приоритет больше текущего наибольшего элемента
            if ($leftChildIndex < $heapSize && $this->heap[$leftChildIndex]['priority'] > $this->heap[$largestIndex]['priority']) {
                $largestIndex = $leftChildIndex;
            }

            // Проверяем, существует ли правый потомок и его приоритет больше текущего наибольшего элемента
            if ($rightChildIndex < $heapSize && $this->heap[$rightChildIndex]['priority'] > $this->heap[$largestIndex]['priority']) {
                $largestIndex = $rightChildIndex;
            }

            // Если индекс наибольшего элемента не равен текущему индексу, меняем их местами
            if ($largestIndex !== $index) {
                $this->swap($index, $largestIndex); // Вызываем метод swap для обмена элементов
                $index = $largestIndex; // Обновляем текущий индекс на индекс наибольшего элемента
            } else {
                break; // Если приоритеты упорядочены, выходим из цикла
            }
        }
    }

    private function swap($i, $j) {
        $temp = $this->heap[$i]; // Запоминаем элемент с индексом $i
        $this->heap[$i] = $this->heap[$j]; // Заменяем элемент с индексом $i элементом с индексом $j
        $this->heap[$j] = $temp; // Заменяем элемент с индексом $j сохраненным элементом
    }
}
//функция sortDataFile, которая использует класс PriorityQueue для сортировки данных из файла data.txt с учетом заданного столбца и порядка сортировки (по возрастанию или убыванию).
// Функция для сортировки файла data.txt
function sortDataFile($columnIndex, $sortingOrder) {
    $priorityQueue = new PriorityQueue();
    $data = file('data.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($data as $line) {
        $fields = explode(' ', $line);
        if (count($fields) > $columnIndex) {
            $priorityQueue->enqueue($line, $fields[$columnIndex]);
        }
    }

    $sortedData = array();
    while (!$priorityQueue->isEmpty()) {
        $sortedData[] = $priorityQueue->dequeue();
    }

    // Если порядок сортировки 'desc', то перевернем массив
    if ($sortingOrder === 'desc') {
        $sortedData = array_reverse($sortedData);
    }

    return $sortedData;
}
//Последний блок кода проверяет, был ли выполнен POST-запрос, и если да, то сортирует данные и отправляет отсортированные данные в ответе.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['columnIndex']) && isset($_POST['sortingOrder'])) {
    $columnIndex = (int)$_POST['columnIndex'];
    $sortingOrder = $_POST['sortingOrder'];
    $sortedData = sortDataFile($columnIndex, $sortingOrder);
    echo implode("\n", $sortedData);
}
?>