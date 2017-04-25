drop table if exists article;

create table article (
  id integer not null primary key auto_increment,
  type varchar(100) not null,
  title varchar(100) not null,
  content varchar(1000) not null,
  demo varchar(1000) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;
