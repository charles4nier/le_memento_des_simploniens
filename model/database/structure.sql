drop table if exists user;

create table user (
  id_user int not null primary key auto_increment,
  login varchar(100) not null,
  password varchar(100) not null,
  role varchar (100) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

drop table if exists article;

create table article (
  id_article int not null primary key auto_increment,
  id_user int not null,
  title varchar(100) not null,
  content varchar(1000) not null,
  link varchar(1000) not null,
  constraint foreign key (id_user) references user(id_user)
) engine=innodb character set utf8 collate utf8_unicode_ci;

drop table if exists tag;

create table tag (
  id_tag integer not null primary key auto_increment,
  tag_name varchar(100) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

drop table if exists tag_article;

create table tag_article (
  id_article int not null,
  id_tag int not null,
  constraint foreign key (id_article) references article(id_article),
  constraint foreign key (id_tag) references tag(id_tag)
) engine=innodb character set utf8 collate utf8_unicode_ci;
