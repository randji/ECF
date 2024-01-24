describe page;

alter table page
add column Name_page varchar(100);

alter table page
change name titre varchar(100);

alter table page
modify id_page int(10) auto_increment primary key ;

insert into page(titre, text, Name_page)
VALUES (
        'Bienvenue chez Garage Parrot, le Spécialiste de la Réparation de Carrosserie Automobile',
        'Chez Garage Parrot, nous comprenons l''importance d''une carrosserie impeccable pour votre véhicule. Que ce soit pour des réparations mineures ou des restaurations complètes, notre équipe de professionnels expérimentés est dédiée à redonner à votre voiture son éclat d''origine.',
        'Réparation Carrosserie'
       );

alter table page
modify text varchar(1000);

insert into page(titre, text, Name_page)
VALUES (
        'Bienvenue chez Garage Parrot, le Spécialiste de la Réparation de Carrosserie Automobile',
        'Chez Garage Parrot, nous comprenons l''importance d''une carrosserie impeccable pour votre véhicule. Que ce soit pour des réparations mineures ou des restaurations complètes, notre équipe de professionnels expérimentés est dédiée à redonner à votre voiture son éclat d''origine.',
        'Réparation Carrosserie'
       );

create table pageName(
    id_pageName int(10),
    namePage varchar(50)
);

describe pagename;

alter table pagename
modify id_pageName int(10) auto_increment primary key ;

insert into pagename(namePage)
VALUES (
        'Vente voiture d\' occasion'
       );

alter table page
add column pagename int(10),
    add foreign key (pagename) references pagename (id_pageName);

alter table page
drop column Name_page;

insert into page(pagename)
VALUES (
        1
       );

delete from page
where id_page=2;

update page
set pagename = 1
where   id_page = 1;

insert into page(titre, text, pagename)
VALUES (
        'Visitez Notre Garage pour Découvrir Notre Gamme','Nous vous invitons à visiter Garage Parrot pour parcourir notre sélection de voitures d\'occasion. Faites un essai routier et découvrez pourquoi nos clients nous font confiance pour leurs besoins en véhicules d''occasion.',4
       );
