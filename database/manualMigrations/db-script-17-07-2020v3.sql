# use tienda;
# use babel;

# cambio en la 808

# drop database if exists babel;
drop database if exists tienda;
# create database if not exists babel;
create database if not exists tienda;

# CREATE USER 'jamahcs' IDENTIFIED BY 'Acceso.117';
GRANT ALL PRIVILEGES ON babel.* TO 'jamahcs';
GRANT ALL PRIVILEGES ON tienda.* TO 'jamahcs';

# CREATE USER 'verohcs' IDENTIFIED BY 'Acceso.117';
GRANT ALL PRIVILEGES ON tienda.* TO 'verohcs';
GRANT ALL PRIVILEGES ON babel.* TO 'verohcs';

# CREATE USER 'laravelsystem' IDENTIFIED BY 'Acceso.117';
GRANT ALL PRIVILEGES ON tienda.* TO 'laravelsystem';
GRANT ALL PRIVILEGES ON babel.* TO 'laravelsystem';


# show databases;
use tienda;
# use babel;

# drop table users;


#EST zona horaria east usa

# describe sells;
# show tables;
# show databases;

# describe oauth_clients;

# describe users;

# show databases;


create table states
(
    id         int NOT NULL AUTO_INCREMENT,
    nameState  varchar(30),
    created_at timestamp,
    updated_at timestamp,
    constraint pk1 primary key (id)
);

insert into states
values (1, 'Aguascalientes', now(), now()),
       (2, 'Baja california norte', now(), now()),
       (3, 'Baja california sur', now(), now()),
       (4, 'Campeche', now(), now()),
       (5, 'Coahuila', now(), now()),
       (6, 'Colima', now(), now()),
       (7, 'Chiapas', now(), now()),
       (8, 'Chihuahua', now(), now()),
       (9, 'Ciudad de México', now(), now()),
       (10, 'Durango', now(), now()),
       (11, 'Guanajuato', now(), now()),
       (12, 'Guerrero', now(), now()),
       (13, 'Hidalgo', now(), now()),
       (14, 'Jalisco', now(), now()),
       (15, 'Mexico', now(), now()),
       (16, 'Michoacan', now(), now()),
       (17, 'Morelos', now(), now()),
       (18, 'Nayarit', now(), now()),
       (19, 'Nuevo Leon', now(), now()),
       (20, 'Oaxaca', now(), now()),
       (21, 'Puebla', now(), now()),
       (22, 'Queretaro', now(), now()),
       (23, 'Quintana Roo', now(), now()),
       (24, 'San Luis Potosi', now(), now()),
       (25, 'Sinaloa', now(), now()),
       (26, 'Sonora', now(), now()),
       (27, 'Tabasco', now(), now()),
       (28, 'Tamaulipas', now(), now()),
       (29, 'Tlaxcala', now(), now()),
       (30, 'Veracruz', now(), now()),
       (31, 'Yucatan', now(), now()),
       (32, 'Zacatecas', now(), now());

create table towns
(
    id         int NOT NULL AUTO_INCREMENT,
    nameTown   varchar(70),
    state_id   int,
    created_at timestamp,
    updated_at timestamp,
    constraint pk2 primary key (id)
);


alter table towns
    add constraint fk1 foreign key (state_id) references states (id) ON DELETE RESTRICT ON UPDATE CASCADE;

insert into towns
values (1, 'AGUASCALIENTES', 9, now(), now()),
       (2, 'ASIENTOS', 9, now(), now()),
       (3, 'CALVILLO', 9, now(), now()),
       (4, 'COSIO', 9, now(), now()),
       (5, 'DIXON,CA', 14, now(), now()),
       (6, 'EL LLANO', 14, now(), now()),
       (7, 'JESUS MARIA', 14, now(), now()),
       (8, 'logimayab', 22, now(), now()),
       (9, 'PABELLON DE ARTEAGA', 22, now(), now()),
       (10, 'RINCON DE ROMOS', 22, now(), now());

# select * from towns;

create table suburbs
(
    id               int NOT NULL AUTO_INCREMENT,
    nameSuburb       varchar(50),
    postalCodeSuburb int(5),
    town_id          int,
    created_at       timestamp,
    updated_at       timestamp,
    constraint pk3 primary key (id),
    constraint fk2 foreign key (town_id) references towns (id) ON DELETE RESTRICT ON UPDATE CASCADE
);

insert into suburbs
values (1, 'Vista Alegre', 45678, 1, now(), now()),
       (2, 'Ignacio Zaragoza', 12345, 1, now(), now()),
       (3, 'Miguel Hidalgo', 87654, 2, now(), now()),
       (4, 'Satelite', 12098, 2, now(), now()),
       (5, 'Las rosas', 29340, 2, now(), now()),
       (6, 'El Romerillal', 10293, 3, now(), now()),
       (7, 'Paraiso', 76148, 4, now(), now()),
       (8, '15 de mayo', 12312, 5, now(), now()),
       (9, 'Independencia', 34345, 6, now(), now()),
       (10, '5 de febrero', 90343, 7, now(), now()),
       (11, 'Primavera', 90812, 8, now(), now()),
       (12, '10 de abril', 90564, 8, now(), now()),
       (13, 'Iguazú', 789321, 8, now(), now()),
       (14, 'Paseos de san Miguel', 12221, 9, now(), now()),
       (15, 'Mompani', 23908, 10, now(), now());

create table addresses
(
    id                    int NOT NULL AUTO_INCREMENT,
    street                varchar(100),
    exteriorNumberAddress int,
    interiorNumberAddress int,
    suburb_id             int,
    created_at            timestamp,
    updated_at            timestamp,
    constraint pk4 primary key (id),
    constraint fk3 foreign key (suburb_id) references suburbs (id) ON DELETE RESTRICT ON UPDATE CASCADE
);

insert into addresses
values (1, 'Universidad', 13, 1, 1, now(), now()),
       (2, 'Los arcos', 45, 23, 2, now(), now()),
       (3, 'Margarita', 91, null, 3, now(), now()),
       (4, 'Amatista', 12, 2, 4, now(), now()),
       (5, 'El globo', 90, null, 5, now(), now()),
       (7, 'Independecia', 13, null, 7, now(), now()),
       (6, 'Flores Magon', 2, null, 6, now(), now()),
       (8, 'De la Paz', 9, null, 8, now(), now()),
       (9, 'Palameres', 8, null, 9, now(), now()),
       (10, 'Portal de San Miguel', 34, null, 10, now(), now()),
       (11, 'El Lienzo', 3, null, 11, now(), now()),
       (12, 'Las Flores', 12, null, 12, now(), now()),
       (13, 'Escoral', 24, null, 13, now(), now()),
       (14, 'Parlamento', 1034, null, 14, now(), now()),
       (15, 'La RAza', 153, null, 15, now(), now()),
       (16, 'Fray Servando', 210, null, 1, now(), now()),
       (17, 'Córdova', 113, null, 2, now(), now()),
       (18, 'Anzures', 912, null, 3, now(), now()),
       (19, 'Los Heróes', 26, null, 4, now(), now()),
       (20, 'Condesa', 89, null, 5, now(), now()),
       (21, 'Paseos', 19, 4, 6, now(), now()),
       (22, 'Luis Linas', 5, 6, 7, now(), now()),
       (23, 'Tlaloc', 91, null, 8, now(), now()),
       (24, 'Laguna', 200, 89, 9, now(), now()),
       (25, 'Mayrán', 409, 233, 10, now(), now()),
       (26, 'Av. Revolución', 40, null, 11, now(), now()),
       (27, 'Gúzman', 349, 345, 12, now(), now()),
       (28, 'La Negreta', 93, null, 13, now(), now()),
       (29, 'Onega', 1234, null, 14, now(), now()),
       (30, 'Amatista', 34, null, 3, now(), now()),
       (31, 'Del placer', 23, null, 7, now(), now()),
       (32, 'Miguel Hidalgo', 67, null, 13, now(), now());

create table offices
(
    id         int NOT NULL AUTO_INCREMENT,
    nameOffice varchar(30),
    address_id int,
    created_at timestamp,
    updated_at timestamp,
    constraint pk5 primary key (id),
    constraint fk4 foreign key (address_id) references addresses (id)
);

insert into offices
values (0, 'SUCURSAL CDMX', 1, now(), now()),
       (0, 'SUCURSAL GUADALAJARA', 5, now(), now()),
       (0, 'SUCURSAL QUERÉTARO', 8, now(), now());

create table categories
(
    id           int NOT NULL AUTO_INCREMENT,
    nameCategory varchar(100),
    created_at   timestamp,
    updated_at   timestamp,
    constraint pk6 primary key (id)
);

insert into categories
values (0, 'Bebé', now(), now()),
       (0, 'Niño', now(), now()),
       (0, 'Niña', now(), now()),
       (0, 'Dama', now(), now()),
       (0, 'Caballero', now(), now());

create table types
(
    id         int NOT NULL AUTO_INCREMENT,
    nameType   varchar(100),
    created_at timestamp,
    updated_at timestamp,
    constraint pk7 primary key (id)
);

insert into types
values (0, 'Playera', now(), now()),
       (0, 'Camisa', now(), now()),
       (0, 'Blusa', now(), now()),
       (0, 'Sudadera', now(), now()),
       (0, 'Pantalón', now(), now());

create table providers
(
    id                  int NOT NULL AUTO_INCREMENT,
    nameProvider        varchar(30),
    apProvider          varchar(50),
    amProvider          varchar(30),
    descriptionProvider varchar(30),
    emailProvider       varchar(70) unique,
    rfcProvider         varchar(13),
    created_at          timestamp,
    updated_at          timestamp,
    constraint pk8 primary key (id)
);

ALTER TABLE providers
    ADD UNIQUE INDEX PROV (emailProvider);

insert into providers
values (0, 'Antonio', 'Resendiz', 'Martinez', 'Prendas textiles', 'antonioresendiz@gmail.com', 'REMA029369I19', now(),
        now()),
       (0, 'Monserrat', 'Hernández', 'Guevara', 'Textiles SA de CV.', 'textiles123@hotmail.com', 'HEGM120890V27', now(),
        now()),
       (0, 'Luis', 'Luna', 'Carbajal', 'Prendas de Mexico', 'prendasmex123@gmail.com', 'LUCL091296', now(), now()),
       (0, 'Miguel', 'Díaz', 'Bermudez', 'Distribuidora de textiles', 'migueldiaz@gmail.com', 'BEBM345679I11', now(),
        now()),
       (0, 'Santiago', 'Lopez', 'Mendoza', 'Textles lopez', 'santiago123@gmail.com', 'LOMS231199HU', now(), now());

# describe users;
# use tienda;
# drop table users;

# sex dictionary:
#   1: Masculino
#   2: Femenino
#   3: Otro


create table users
(
    id                   bigint(20)          NOT NULL auto_increment,
    provider             varchar(255),
    provider_id          varchar(255),
    name                 varchar(255),
    nameNotAutentication varchar(255),
    ap                   varchar(255),
    am                   varchar(255),
    email                varchar(255) unique not null,
    email_verified_at    timestamp,
    password             varchar(255),
    remember_token       varchar(100),
    avatar               varchar(50) unique,
    typeUser             int default 2,
    sex                  int,
    birthdate            date,
    created_at           timestamp,
    updated_at           timestamp,
    constraint pk9 primary key (id)
);

ALTER TABLE users
    ADD UNIQUE INDEX USU (id);

# drop trigger typeUsers;

# create trigger typeUsers
#     before insert on users
#     for each row
#     begin
#         set new.typeUser=2;
#     end;

#  ALTER TABLE users
#      ADD UNIQUE INDEX names (nom_clie, ap_clie, am_clie);
# ALTER TABLE users
#     ADD UNIQUE INDEX email (email);


# delimiter //
# create trigger encripta
#     before insert
#     on users
#     for each row
# begin
#     set new.pass_us = aes_encrypt(new.pass_us, "UTEQDTAI");
# end //
# delimiter ;
#
# insert into users (id, name, email, email_verified_at, password, avatar, typeUser, created_at, updated_at)
# values (0, 'Jama', 'jamahcs@outlook.com', now(), 'acceso.jama', 'jamahcs', 1, now(), now()),
#        (0, 'Veronica2', 'verohcs@outlook.com', now(), 'acceso.vero', 'verohcs', 1, now(), now()),
#        (0, 'Alma', 'alopez@uteq.edu.mx', now(), 'acceso.alma', 'almahcs', 1, now(), now()),
#        (0, 'Victor', 'vaguilar@uteq.edu.mx', now(), 'acceso.victor', 'victorhcs', 1, now(), now()),
#        (0, 'Antonio', 'asanchezc@uteq', now(), 'acceso.antonio', 'antoniohcs', 2, now(), now()),
#        (0, 'Andrea', 'andreahcs@outlook.com', now(), 'acceso.andrea', 'andreahcs', 2, now(), now()),
#        (0, 'Alan', 'alanhcs@outlook.com', now(), 'acceso.alan', 'alanhcs', 2, now(), now()),
#        (0, 'Vanessa', 'vanessahcs@outlook.com', now(), 'acceso.vane', 'vanehcs', 2, now(), now());

create table administrators
(
    id         int NOT NULL AUTO_INCREMENT,
    user_id    bigint(20),
    office_id  int,
    created_at timestamp,
    updated_at timestamp,
    constraint pk10 primary key (id),
    constraint fk5 foreign key (user_id) references users (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    constraint fk6 foreign key (office_id) references offices (id) ON DELETE cascade ON UPDATE CASCADE
);

# ALTER TABLE administrators
#     ADD UNIQUE INDEX ADM (nom_adm, ap_adm, am_adm);
# ALTER TABLE administrators
#     ADD UNIQUE INDEX correoADM (correo_adm);

# select * from users;

insert into administrators
values (0, 1, 1, now(), now()),
       (0, 2, 2, now(), now());
#        (0, 3, 3, now(), now()),
#        (0, 4, 1, now(), now());

create table clients
(
    id         int NOT NULL AUTO_INCREMENT,
    rfcClient  varchar(17),
    address_id int,
    user_id    bigint,
    created_at timestamp,
    updated_at timestamp,
    constraint pk11 primary key (id),
    constraint fk7 foreign key (address_id) references addresses (id),
    constraint fk8 foreign key (user_id) references users (id) ON DELETE RESTRICT ON UPDATE CASCADE
);
#
# ALTER TABLE clients
#     ADD UNIQUE INDEX CLIE (nom_clie, ap_clie, am_clie);
# ALTER TABLE clients
#     ADD UNIQUE INDEX CorreoClie (correo_clie);

# use tienda;

insert into clients
values (0, 'sdfg234567', 4, 5, now(), now()),
       (0, 'lkhgf345', 4, 6, now(), now()),
       (0, 'Cjhgfd678', 5, 7, now(), now()),
       (0, 'p987654f', 7, 8, now(), now());

select *
from clients;

create table phones
(
    id          int NOT NULL AUTO_INCREMENT,
    num_tel     char(13),
    client_id   int,
    office_id   int,
    provider_id int,
    created_at  timestamp,
    updated_at  timestamp,
    constraint pk12 primary key (id),
    constraint fk10 foreign key (client_id) references clients (id) ON DELETE set null ON UPDATE CASCADE,
    constraint fk11 foreign key (office_id) references offices (id) ON DELETE cascade ON UPDATE CASCADE,
    constraint fk12 foreign key (provider_id) references providers (id) ON DELETE cascade ON UPDATE CASCADE
);

# select * from phones;

insert into phones
values (0, '44256789231', 1, null, null, now(), now()),
       (0, '4467132456', 2, null, null, now(), now()),
       (0, '4457890129', 2, null, null, now(), now()),
       (0, '5567324150', 3, null, null, now(), now()),
       (0, '5612341266', 4, null, null, now(), now()),
       (0, '4429090189', 4, null, null, now(), now()),
       (0, '5612899911', null, 1, null, now(), now()),
       (0, '4467162699', null, 2, null, now(), now()),
       (0, '4410102938', null, 3, null, now(), now()),
       (0, '4412901029', null, null, 1, now(), now()),
       (0, '4412309023', null, null, 1, now(), now()),
       (0, '4290653411', null, null, 2, now(), now()),
       (0, '5512347878', null, null, 2, now(), now()),
       (0, '4231674511', null, null, 3, now(), now()),
       (0, '5590765644', null, null, 4, now(), now()),
       (0, '5556433312', null, null, 4, now(), now()),
       (0, '4423563444', null, null, 5, now(), now());

create table products
(
    id          int NOT NULL AUTO_INCREMENT,
    nameProduct varchar(100),
    desc_prod   varchar(200),
    costo_prod  float(10, 2),
    precio_prod float(10, 2),
    mat_prod    varchar(50),
    img_prod    varchar(100),
    type_id     int,
    category_id int,
    provider_id int,
    created_at  timestamp,
    updated_at  timestamp,
    CHECK (precio_prod > costo_prod),
    constraint pk13 primary key (id),
    constraint fk13 foreign key (type_id) references types (id) ON DELETE cascade ON UPDATE CASCADE,
    constraint fk14 foreign key (category_id) references categories (id) ON DELETE cascade ON UPDATE CASCADE,
    constraint fk15 foreign key (provider_id) references providers (id) ON DELETE cascade ON UPDATE CASCADE
);

ALTER TABLE products
    ADD UNIQUE INDEX PROD (nameProduct);
ALTER TABLE products
    ADD UNIQUE INDEX IMGPROD (img_prod);


insert into products
values (0, 'Gerber Body', 'Set de 5 Unidades variadas de Mono para niños', 250, 350, 'Algodón', null, 1, 1, 1, now(),
        now()),
       (0, 'Camisa blanca, estampado 2', 'Tommy Hilfiger CD87176401', 220, 340, '90% algodón', null, 2, 2, 2, now(),
        now()),
       (0, 'Camisa bajo con nudo', 'Camisa amarilla, con nudo bajo de manga a capas', 100, 180, 'Poliéster y algodón',
        null, 3, 3, 3, now(), now()),
       (0, 'Sudadera Liso Rosa', 'Sudaderas Cordón Liso, hombro caido Rosa Casual', 290, 560,
        '97% Poliéster, 3% spandex', NULL, 4, 4, 4, now(), now()),
       (0, 'Pantalón chino', 'Pantalón  chino cafe regular fit·', 780, 1000, '97% Algodón 3% Elastano', null, 5, 5, 5,
        now(), now()),
       (0, 'Gerber Body estampado', 'Gerber body Mono para niños', 150, 250, 'Algodón 100%', null, 1, 1, 1, now(),
        now()),
       (0, 'Camisa roja estampado 2', 'Camisa roja Tommy Hilfiger', 320, 440, '90% algodón', null, 2, 2, 2, now(),
        now()),
       (0, 'Playera top', 'Camisa amarilla, con nudo bajo de manga a capas', 100, 180, 'Poliéster y algodón', null, 3,
        3, 3, now(), now()),
       (0, 'Sudadera Estampado', 'Sudaderas Cordón Liso, hombro caido Rosa Casual', 290, 560, '97% Poliéster', NULL, 4,
        4, 4, now(), now()),
       (0, 'Pantalón mezclica', 'Pantalón  mezclilla regular fit·', 780, 1000, '97% Algodón 3% Elastano', null, 5, 5,
        5, now(), now());


create table sizes
(
    id         int not null auto_increment,
    nom_talla  varchar(30),
    created_at timestamp,
    updated_at timestamp,
    PRIMARY KEY (id)
);

insert into sizes
values (0, 'Chica', now(), now()),
       (0, 'Mediana', now(), now()),
       (0, 'Grande', now(), now()),
       (0, 'Extra grande', now(), now());

create table sizeDetails
(
    id         int not null auto_increment,
    product_id int,
    size_id    int,
    created_at timestamp,
    updated_at timestamp,
    primary key (id),
    foreign key (product_id) references products (id) ON DELETE cascade ON UPDATE CASCADE,
    foreign key (size_id) references sizes (id) ON DELETE restrict ON UPDATE CASCADE
);

insert into sizeDetails
values (0, 1, 1, now(), now()),
       (0, 1, 2, now(), now()),
       (0, 1, 3, now(), now()),
       (0, 1, 4, now(), now()),
       (0, 2, 1, now(), now()),
       (0, 2, 2, now(), now()),
       (0, 2, 3, now(), now()),
       (0, 2, 4, now(), now()),
       (0, 3, 1, now(), now()),
       (0, 3, 2, now(), now()),
       (0, 3, 3, now(), now()),
       (0, 3, 4, now(), now()),
       (0, 4, 1, now(), now()),
       (0, 4, 2, now(), now()),
       (0, 4, 3, now(), now()),
       (0, 4, 4, now(), now()),
       (0, 5, 1, now(), now()),
       (0, 5, 2, now(), now()),
       (0, 5, 3, now(), now()),
       (0, 5, 4, now(), now()),
       (0, 6, 1, now(), now()),
       (0, 6, 2, now(), now()),
       (0, 6, 3, now(), now()),
       (0, 6, 4, now(), now()),
       (0, 7, 1, now(), now()),
       (0, 7, 2, now(), now()),
       (0, 7, 3, now(), now()),
       (0, 7, 4, now(), now()),
       (0, 8, 1, now(), now()),
       (0, 8, 2, now(), now()),
       (0, 8, 3, now(), now()),
       (0, 8, 4, now(), now()),
       (0, 9, 1, now(), now()),
       (0, 9, 2, now(), now()),
       (0, 9, 3, now(), now()),
       (0, 9, 4, now(), now()),
       (0, 10, 1, now(), now()),
       (0, 10, 2, now(), now()),
       (0, 10, 3, now(), now()),
       (0, 10, 4, now(), now());


create table inventories
(
    id         int NOT NULL AUTO_INCREMENT,
    exist_inv  int,
    stat_inv   varchar(30),
    descuento  float(10, 2),
    size_id    int,
    office_id  int,
    created_at timestamp,
    updated_at timestamp,
    PRIMARY KEY (id),
    constraint fk16 foreign key (size_id) references sizeDetails (id) ON DELETE cascade ON UPDATE CASCADE,
    constraint foreign key (office_id) references offices (id) ON DELETE cascade ON UPDATE CASCADE
);

# SET GLOBAL log_bin_trust_function_creators = 1;

delimiter //
create trigger descuento
    before insert
    on inventories
    for each row
begin
    case
        when new.stat_inv = 'Liquidación' then
            set new.descuento = 0.10;

        when new.stat_inv = 'De temporada' then
            set new.descuento = 0;

        end case;
end //

delimiter ;

delimiter //
create trigger descuento_d
    before update
    on inventories
    for each row
begin
    case
        when new.stat_inv = 'Liquidación' then
            set new.descuento = 0.10;

        when new.stat_inv = 'De temporada' then
            set new.descuento = 0;

        end case;
end //

delimiter ;


insert into inventories
values (0, 54, 'De temporada', null, 1, 1, now(), now()),
       (0, 124, 'De temporada', null, 5, 1, now(), now()),
       (0, 200, 'De temporada', null, 9, 1, now(), now()),
       (0, 230, 'De temporada', null, 13, 1, now(), now()),
       (0, 10, 'Liquidación', null, 17, 1, now(), now()),
       (0, 13, 'De temporada', null, 21, 1, now(), now()),
       (0, 200, 'De temporada', null, 25, 1, now(), now()),
       (0, 100, 'De temporada', null, 29, 1, now(), now()),
       (0, 120, 'De temporada', null, 30, 1, now(), now()),
       (0, 21, 'Liquidación', null, 3, 1, now(), now()),
       (0, 54, 'De temporada', null, 2, 2, now(), now()),
       (0, 124, 'De temporada', null, 6, 2, now(), now()),
       (0, 200, 'De temporada', null, 10, 2, now(), now()),
       (0, 230, 'De temporada', null, 14, 2, now(), now()),
       (0, 10, 'Liquidación', null, 18, 2, now(), now()),
       (0, 13, 'De temporada', null, 22, 2, now(), now()),
       (0, 200, 'De temporada', null, 26, 2, now(), now()),
       (0, 100, 'De temporada', null, 30, 2, now(), now()),
       (0, 120, 'De temporada', null, 3, 2, now(), now()),
       (0, 21, 'Liquidación', null, 3, 2, now(), now()),
       (0, 54, 'De temporada', null, 7, 3, now(), now()),
       (0, 124, 'De temporada', null, 11, 3, now(), now()),
       (0, 200, 'De temporada', null, 15, 3, now(), now()),
       (0, 230, 'De temporada', null, 19, 3, now(), now()),
       (0, 10, 'Liquidación', null, 23, 3, now(), now()),
       (0, 21, 'Liquidación', null, 27, 3, now(), now()),
       (0, 100, 'De temporada', null, 31, 3, now(), now()),
       (0, 80, 'De temporada', null, 1, 3, now(), now()),
       (0, 90, 'De temporada', null, 5, 3, now(), now()),
       (0, 20, 'Liquidación', null, 4, 3, now(), now()),
       (0, 18, 'Liquidación', null, 1, 3, now(), now());


create table buys
(
    id               int NOT NULL AUTO_INCREMENT,
    fec_com          date,
    pago_com         float(10, 2),
    administrator_id int,
    created_at       timestamp,
    updated_at       timestamp,
    primary key (id),
    foreign key (administrator_id) references administrators (id)
);

insert into buys
values (0, 20200710, 0, 1, now(), now());



create table buyDetails
(
    buy_id       int,
    inventory_id int,
    cantidad_com int,
    created_at   timestamp,
    updated_at   timestamp,
    foreign key (buy_id) references buys (id),
    foreign key (inventory_id) references inventories (id) ON DELETE RESTRICT ON UPDATE CASCADE
);


# drop PROCEDURE TOTAL_COMPRA;

DELIMITER //
CREATE PROCEDURE TOTAL_COMPRA(in buys int, out total float(10, 2))
BEGIN
    SELECT SUM(cantidad_com * costo_prod)
    into total
    FROM products,
         buyDetails,
         buys,
         inventories,
         sizeDetails
    WHERE products.id = sizeDetails.product_id
      AND buyDetails.buy_id = buys.id
      AND buyDetails.inventory_id = inventories.id
      AND sizeDetails.size_id = inventories.size_id
      and buys.id = buys;
END //
DELIMITER ;

# drop trigger total_com;

DELIMITER //
CREATE TRIGGER total_com
    AFTER INSERT
    ON buyDetails
    FOR EACH ROW
BEGIN
    CALL total_compra(new.buy_id, @total);
    UPDATE buys
    SET pago_com = @total
    WHERE id = new.buy_id;
END //
DELIMITER ;

# select *
# from buys;

# drop trigger total_com;
# select * from inventories;

insert into buyDetails
values (1, 1, 48, now(), now());

create table sells
(
    id         int NOT NULL AUTO_INCREMENT,
    fec_vta    date,
    monto_pago float(10, 2),
    status_vta varchar(50),
    client_id  int,
    created_at timestamp,
    updated_at timestamp,
    constraint pk17 primary key (id),
    constraint fk17 foreign key (client_id) references clients (id) ON DELETE set null ON UPDATE CASCADE
);



insert into sells
values (0, 20200312, 0, 'Finalizado', 1, now(), now()),
       (0, 20200313, 0, 'Finalizado', 1, now(), now()),
       (0, 20200327, 0, 'Finalizado', 2, now(), now()),
       (0, 20200320, 0, 'Finalizado', 3, now(), now()),
       (0, 20200403, 0, 'Finalizado', 1, now(), now()),
       (0, 20200405, 0, 'Finalizado', 3, now(), now()),
       (0, 20200416, 0, 'Finalizado', 4, now(), now()),
       (0, 20200418, 0, 'Finalizado', 4, now(), now()),
       (0, 20200512, 0, 'Finalizado', 1, now(), now()),
       (0, 20200515, 0, 'Finalizado', 2, now(), now());



create table pays
(
    id         int NOT NULL AUTO_INCREMENT,
    fec_pago   date,
    tipo_pago  varchar(30),
    sell_id    int,
    created_at timestamp,
    updated_at timestamp,
    constraint pk18 primary key (id),
    constraint fk18 foreign key (sell_id) references sells (id) ON DELETE RESTRICT ON UPDATE RESTRICT
);

# select * from sells;


insert into pays
values (0, 20200312, 'Debito', 1, now(), now()),
       (0, 20200313, 'Debito', 2, now(), now()),
       (0, 20200327, 'Paypal', 3, now(), now()),
       (0, 20200320, 'Paypal', 4, now(), now()),
       (0, 20200403, 'Paypal', 5, now(), now()),
       (0, 20200405, 'Paypal', 6, now(), now()),
       (0, 20200416, 'Debito', 9, now(), now()),
       (0, 20200418, 'Debito', 8, now(), now()),
       (0, 20200512, 'Paypal', 7, now(), now()),
       (0, 20200515, 'Paypal', 4, now(), now());


create table tickets
(
    id         int NOT NULL AUTO_INCREMENT,
    fec_fac    date,
    sell_id    int,
    created_at timestamp,
    updated_at timestamp,
    constraint pk19 primary key (id),
    constraint fk19 foreign key (sell_id) references sells (id) ON DELETE RESTRICT ON UPDATE RESTRICT
);

insert into tickets
values (0, 20200412, 1, now(), now()),
       (0, 20200427, 3, now(), now()),
       (0, 20200503, 5, now(), now()),
       (0, 20200512, 9, now(), now()),
       (0, 20200515, 10, now(), now());
# use babel;

create table sellDetails
(
    sell_id      int,
    inventory_id int,
    cantidad     int,
    created_at   timestamp,
    updated_at   timestamp,
    constraint fk20 foreign key (sell_id) references sells (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    constraint fk21 foreign key (inventory_id) references inventories (id) ON DELETE RESTRICT ON UPDATE CASCADE
);


delimiter //
create trigger existencia_menos
    after insert
    on sellDetails
    for each row
begin
    update inventories
    set inventories.exist_inv = inventories.exist_inv - new.cantidad
    where inventories.id = new.inventory_id;
end //

# select *
# from inventories
//


delimiter //
create trigger existencia_mas
    after insert
    on buyDetails
    for each row
begin
    update inventories
    set inventories.exist_inv = inventories.exist_inv + new.cantidad_com
    where inventories.id = new.inventory_id;
end //

# select *
# from inventories
//


# drop PROCEDURE TOT_VTA;

DELIMITER //
CREATE PROCEDURE TOT_VTA(in sells int, out total float(10, 2))
BEGIN
    SELECT SUM(cantidad * precio_prod - (cantidad * precio_prod * descuento))
    into total
    FROM products,
         sellDetails,
         tienda.sells,
         inventories,
         sizeDetails
    WHERE products.id = sizeDetails.product_id
      AND sellDetails.sell_id = sells.id
      AND sellDetails.inventory_id = inventories.id
      AND sizeDetails.size_id = inventories.size_id
      and sells.id = sells;
END //

DELIMITER ;

# drop trigger tot;

DELIMITER //
CREATE TRIGGER tot
    AFTER INSERT
    ON sellDetails
    FOR EACH ROW
BEGIN
    CALL tot_vta(new.sell_id, @total);
    UPDATE sells
    SET monto_pago = @total
    WHERE id = new.sell_id;
END //
DELIMITER ;

insert into sellDetails
values (1, 1, 2, now(), now()),
       (1, 2, 2, now(), now()),
       (1, 3, 1, now(), now()),
       (2, 4, 5, now(), now()),
       (2, 5, 1, now(), now()),
       (2, 6, 3, now(), now()),
       (3, 7, 4, now(), now()),
       (3, 8, 2, now(), now()),
       (3, 9, 4, now(), now()),
       (4, 10, 1, now(), now()),
       (4, 11, 2, now(), now()),
       (4, 12, 3, now(), now()),
       (5, 13, 4, now(), now()),
       (5, 14, 2, now(), now()),
       (5, 15, 1, now(), now()),
       (6, 16, 4, now(), now()),
       (6, 17, 2, now(), now()),
       (6, 18, 3, now(), now()),
       (7, 19, 4, now(), now()),
       (7, 20, 5, now(), now()),
       (8, 21, 1, now(), now()),
       (8, 22, 2, now(), now()),
       (9, 23, 3, now(), now()),
       (9, 24, 4, now(), now()),
       (10, 25, 5, now(), now()),
       (10, 26, 6, now(), now()),
       (10, 27, 1, now(), now());


create table shipments
(
    id         int NOT NULL AUTO_INCREMENT,
    fec_env    date,
    fec_ent    date,
    sell_id    int,
    address_id int,
    created_at timestamp,
    updated_at timestamp,
    check (fec_env < fec_ent),
    primary key (id),
    foreign key (sell_id) references sells (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
    foreign key (address_id) references addresses (id)
);



create table audits
(
    id         int auto_increment primary key,
    usuario    varchar(30),
    product_id int,
    old_precio float(10, 2),
    new_precio float(10, 2),
    created_at timestamp,
    updated_at timestamp,
    constraint foreign key (product_id) references products (id)
);

delimiter //
create trigger Auditoria
    before update
    on products
    for each row
begin
    insert into audits
    values (0, current_user(), new.id, old.precio_prod,
            new.precio_prod, now(), now());
end //

delimiter ;


delimiter //
create trigger verifica
    before insert
    on sells
    for each row
begin
    if new.fec_vta < now()
    then
        set new.fec_vta = now();
    end if;
end //
delimiter ;

#
# show databases;
# use babel;
# show tables;
#
# drop table sells;
