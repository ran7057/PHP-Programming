# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
    mysql> create table tableboard_shop (
                -> num int(11) not null auto_increment,
                -> date date,
                -> order_id varchar(100),
                -> name varchar(100),
                -> price varchar(100),
                -> quantity varchar(100),
                -> primary key(num)
                -> );
    
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]
 MySQL database 연동
- mysql_connect  (db 연결)
- mysql_select_db  (db 선택)

mysql_query() 함수를 이용해서, MySQL 에 쿼리 스트링 전송 
- mysql_query

mysqli_fetch_array()를 이용해서 전달받은 레코드를 가져온다. 
$row = mysqli_fetch_array($result) 를 써서 row에 전달받은 것을 저장한다.
$total은 db 안에서 변수를 따로 만들지 않고 while문 안에 total값을 가격과 양의 곱으로 저장해준다.
location.href = ('board_form.php?num=$row[num]') 을 이용해서 해당되는 num값을 가진 게시글로 넘어가게 한다.

## board_form.php 수정
[여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]

 MySQL database 연동
- mysql_connect  (db 연결)
- mysql_select_db  (db 선택)

isset($_GET[num])으로 num값이 있으면 $sql = "select * from tableboard_shop where num = $_GET[num]" 을 사용해
num에 해당하는 레코드를 가져온다.
mysqli_fetch_array(result)를 이용해서 전달받은 레코드를 가져온다.

isset($_GET[num])으로 해당 num값에서 function- update가 작동하게 한다.
isset($_GET[num])이 아니면 받은 값을 insert.php로 전달한다.

board_form에서 echo문을 사용해 수정 전 원래의 값들이( $ row[] ) 화면에 출력되게 한다. 
$total은 db 안에서 변수를 따로 만들지 않고 while문 안에 total값을 가격과 양의 곱으로 저장해준다. 

## function


### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]

 MySQL database 연동
- mysql_connect  (db 연결)
- mysql_select_db  (db 선택)

$sql을 사용하여 $_POST[ ] 를 통해 받은 값을 tableboard_shop에 넣어 새로운 레코드를 만든다.
(이 때 변수의 속성을 잘 생각해서 명령문을 작성한다..)
‌insert를 실패하면 error창을 띄운다.
성공하면 원래의 페이지 index.php로 돌아가 보드를 확인한다.

### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]

 MySQL database 연동
- mysql_connect  (db 연결)
- mysql_select_db  (db 선택)

$sql을 사용하여 $_POST[ ] 를 통해 받은 값을 tableboard_shop의 $_GET[num]인 레코드를 수정한다.
update를 실패하면 error창을 띄운다.
성공하면 원래의 페이지 index.php로 돌아가 보드를 확인한다.

### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]

 MySQL database 연동
- mysql_connect  (db 연결)
- mysql_select_db  (db 선택)

$sql을 사용하여 delete로 num이 $num 값을 가지는 레코드를 삭제한다.
delete를 실패하면 error창을 띄운다.
성공하면 원래의 페이지 index.php로 돌아가 보드를 확인한다.