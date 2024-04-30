схема-admining -- страница admin_product.html -- база bd
схема-base_data -- страница index.html -- база bd2
схема-user_acc -- страница registration.html -- база bd3
схема-user_acc -- страница look_for_id.html -- база bd4
схема-user_order_base or base_data--страница user_order.php--база bd5

!1-user input id_user
!+-2-user look for name production in search of base data-hidden
!3-user input count
+-4-price get from base
5-cost from formyla - price*count
!+-6-развилка по доставке - auto null
+-7-production time from base
+- - from data base
! - from user

<!--
id_user - вводит юзер
id_production - выбирает юзер из доступных
count - водит юзер
price - берется из бд со связным товаром
cost - вычисляется программой из количество*цена
delivery time - auto 0 иначе пользователь выбирает - да и берется значение из бд
production time - берется из бд со связным товаром
==> в data_base  http://localhost/bd2/index.php? высчитываем total_time
также сюда переносится вычисляемая в процессе cost в total_cost
-->

<!--сделать php функциональный отклик на заказ
например - такого id нет\есть
имя - id продукта через поиск или через всплываюшие блоки
итоговая стоимость считается из количесто*цена на единицу
доставка не обязательна и авто = 0
итоговое время в базе админов=время доставки+ремя производства
 -->