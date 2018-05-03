Create Database Meawer;
use Meawer;

Create table Kittens (
  id_kitten int not null auto_increment,
  username varchar(50) not null,
  email varchar(50) not null,
  password varchar(50) not null,
  name varchar(50) not null,
  surname varchar(50) not null,
  register_date datetime not null default current_timestamp,
  born_date datetime not null,
  id_image int,
  id_backgroung_image int,

  Primary Key (id_kitten)
);

Create table Meaws (
  id_meaw int not null auto_increment,
  id_kitten int not null,
  id_image int,
  publish_date datetime not null default current_timestamp,
  content varchar(280) not null default '',

  Primary Key (id_meaw)
);

Create table Re_Meaws (
  id_meaw int not null auto_increment,
  id_kitten int not null,
  re_meaw_date datetime not null default current_timestamp,

  Primary Key (id_meaw, id_kitten),
  Unique (id_meaw, id_kitten)
);

Create table Comments (
  id_comment int not null auto_increment,
  id_meaw int not null,
  id_kitten int not null,
  coment_date datetime not null default current_timestamp,
  content varchar(280) not null default '',

  Primary Key (id_comment)
);

Create table Purrs_x_Meaw (
  id_kitten int not null,
  id_meaw int not null,

  Primary Key (id_kitten, id_meaw),
  Unique (id_kitten, id_meaw)
);

Create table Purrs_x_Comment (
  id_kitten int not null,
  id_comment int not null,

  Primary Key (id_kitten, id_comment),
  Unique (id_kitten, id_comment)
);

Create table Images (
  id_image int not null auto_increment,
  path varchar(50) not null,

  Primary Key (id_image)
);

Alter table Kittens add Constraint FK_Kitten_Image Foreign Key (id_image) references Images(id_image);
Alter table Kittens add Constraint FK_Kitten_BackgroundImage Foreign Key (id_backgroung_image) references Images(id_image);

Alter table Meaws add Constraint FK_Meaws_Kitten Foreign Key (id_kitten) references Kittens(id_kitten);
Alter table Meaws add Constraint FK_Meaws_Image Foreign Key (id_image) references Images(id_image);

Alter table Re_Meaws add Constraint FK_ReMeaws_Kitten Foreign Key (id_kitten) references Kittens(id_kitten);
Alter table Re_Meaws add Constraint FK_ReMeaws_Meaw Foreign Key (id_meaw) references Meaws(id_meaw);

Alter table Comments add Constraint FK_Comments_Meaw Foreign Key (id_meaw) references Meaws(id_meaw);
Alter table Comments add Constraint FK_Comments_Kitten Foreign Key (id_kitten) references Kittens(id_kitten);

Alter table Purrs_x_Meaw add Constraint FK_PurrsMeaw_Kitten Foreign Key (id_kitten) references Kittens(id_kitten);
Alter table Purrs_x_Meaw add Constraint FK_PurrsMeaw_Meaw Foreign Key (id_meaw) references Meaws(id_meaw);

Alter table Purrs_x_Comment add Constraint FK_PurrsComment_Kitten Foreign Key (id_kitten) references Kittens(id_kitten);
Alter table Purrs_x_Comment add Constraint FK_PurrsComment_Comment Foreign Key (id_comment) references Comments(id_comment);
