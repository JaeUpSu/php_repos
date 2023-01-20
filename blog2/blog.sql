create table blog2 (
   num int not null auto_increment,
   id char(15) not null,
   nick_name  char(10) not null,
   cat char(10),
   content text not null,
   regist_day char(20),
   primary key(num)
);

