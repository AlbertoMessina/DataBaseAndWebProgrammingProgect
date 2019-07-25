-- --------------------------------- SCHEMA BASE DI DATI --------------------------------- --
drop database if exists AM_webSite;
create database AM_webSite;
use AM_webSite;

create table CLIENTE(
	CODICE INTEGER auto_increment PRIMARY KEY,
	CITTA VARCHAR(20),
	INDIRIZZO VARCHAR(30),
	TELEFONO VARCHAR(15),
	N_SITI INTEGER,
	SPESA_TOTALE INTEGER
)Engine='InnoDB';


create table SVILUPPATORE(
	PIVA VARCHAR(15) PRIMARY KEY,
    NOME VARCHAR(15),
    COGNOME VARCHAR(15),
    TELEFONO VARCHAR(15)
)Engine='InnoDB';


create table LAYOUT(
	ID INTEGER auto_increment PRIMARY KEY,
    COSTO_TOTALE INTEGER,
    SVILUPPATORE VARCHAR(15),
    INDEX new_sviluppatore(SVILUPPATORE),
    FOREIGN KEY (SVILUPPATORE) REFERENCES SVILUPPATORE(PIVA)
)Engine='InnoDB';


create table SITO_WEB(
	CODICE INTEGER AUTO_INCREMENT PRIMARY KEY,
    URL VARCHAR(50),
    DATA_PUBBLICAZIONE date,
    CLIENTE INTEGER,
    LAYOUT INTEGER,
    INDEX new_cliente(CLIENTE),
    INDEX new_layout(LAYOUT),
    FOREIGN KEY (CLIENTE) REFERENCES CLIENTE(CODICE),
    FOREIGN KEY (LAYOUT) REFERENCES LAYOUT(ID)
)Engine='InnoDB';

select * from VISITATORE where IP =any(select IP from VISITA where sito = '1');
create table VISITATORE(
	IP VARCHAR(15),
    DATA DATE,
    PRIMARY KEY (IP,DATA) 
)Engine='InnoDB';


create table VISITA(
	IP VARCHAR(15),
    DATA DATE,
    SITO INTEGER,
    INDEX new_sito1(SITO),
	INDEX new_visitatore(IP,data),
    FOREIGN KEY (SITO) REFERENCES SITO_WEB(CODICE),
    FOREIGN KEY (IP,DATA) REFERENCES VISITATORE(IP,DATA),
    PRIMARY KEY(IP,DATA,SITO)
)Engine='InnoDB';
select * from UTENTE;

create table MODULO(
	ID INTEGER auto_increment PRIMARY KEY,
    NOME VARCHAR(20),
    FUNZIONE VARCHAR(100),
    COSTO INTEGER
)Engine='InnoDB';


create table COMPONENTE(
	ID_LAYOUT INTEGER,
    ID_MODULO INTEGER,
    INDEX new_id_layout (ID_LAYOUT),
    INDEX new_id_modulo (ID_MODULO),
    FOREIGN KEY (ID_LAYOUT) REFERENCES LAYOUT(ID),
    FOREIGN KEY (ID_MODULO) REFERENCES MODULO(ID),
    PRIMARY KEY(ID_LAYOUT,ID_MODULO)
)Engine='InnoDB';


create table UTENTE(
	USERNAME varchar(45) primary key,
    PASSWORD varchar(45) not null,
	NOME varchar(20),
    COGNOME varchar(20),
    MAIL varchar(255),
    TIPOLOGIA integer,	 	-- tipologia = 1 => amministratore, tipologia = 2 => sviluppatore, tipologia = 3 => cliente
    TELEFONO VARCHAR(15)	-- Tramite il telefono riesco a legare un UTENTE con uno SVILUPPATORE o con un CLIENTE
) Engine = 'InnoDB';


create table CODICEUTENTE(	-- Tabella che mantiene dei codici che invio via sms all'utente per identificarlo tramite il suo telefono (in questo modo identifico anche se è sviluppatore o cliente)
	CODICE varchar(12) primary key
) Engine = 'InnoDB';


-- ---------------TRIGGERS --------------- --
-- Triggers su costoTotale di LAYOUT
DELIMITER //
create trigger triggerLayout1
after insert  on COMPONENTE
for each row
begin
	update LAYOUT set COSTO_TOTALE = COSTO_TOTALE + (select distinct(M.COSTO) 
														from COMPONENTE C join MODULO M on C.ID_MODULO = M.ID
														where M.ID = new.ID_MODULO)
	where ID = new.ID_LAYOUT;
end //
DELIMITER ;

DELIMITER //
create trigger triggerLayout2
before delete on COMPONENTE
for each row
begin
	update LAYOUT set COSTO_TOTALE = COSTO_TOTALE - (select distinct(M.COSTO) 
														from COMPONENTE C join MODULO M on C.ID_MODULO = M.ID
														where M.ID = old.ID_MODULO)
	where ID = old.ID_LAYOUT;
end //
DELIMITER ;

DELIMITER //
create trigger triggerLayout3
before update on COMPONENTE
for each row
begin
    update LAYOUT set COSTO_TOTALE = COSTO_TOTALE - (select distinct(M.COSTO) 
														from COMPONENTE C join MODULO M on C.ID_MODULO = M.ID
														where M.ID = old.ID_MODULO)
	where ID = old.ID_LAYOUT;
end //
DELIMITER ;

DELIMITER //
create trigger triggerLayout4
after update on COMPONENTE
for each row
begin
    update LAYOUT set COSTO_TOTALE = COSTO_TOTALE + (select distinct(M.COSTO) 
													 from COMPONENTE C join MODULO M on C.ID_MODULO = M.ID
													 where M.ID = new.ID_MODULO)
	where ID = new.ID_LAYOUT;
end //
DELIMITER ;

-- Triggers su spesa_totale e n_siti di CLIENTE
DELIMITER //
create trigger triggerCliente1
after insert  on SITO_WEB
for each row
begin
	update CLIENTE set N_SITI = N_SITI + 1
	where CODICE = new.CLIENTE;
    
    update CLIENTE set SPESA_TOTALE = SPESA_TOTALE + (select COSTO_TOTALE from LAYOUT where ID=new.LAYOUT)
	where CODICE = new.CLIENTE;
end //
DELIMITER ;

DELIMITER //
create trigger triggerCliente2
before delete on SITO_WEB
for each row
begin
	update CLIENTE set N_SITI = N_SITI - 1
	where CODICE = old.CLIENTE;
    
    update CLIENTE set SPESA_TOTALE = SPESA_TOTALE - (select COSTO_TOTALE from LAYOUT where ID=old.LAYOUT)
	where CODICE = old.CLIENTE;
end //
DELIMITER ;


-- --------------------------------- VALORI --------------------------------- --
insert into CLIENTE(CITTA, INDIRIZZO, TELEFONO, N_SITI, SPESA_TOTALE) values('Catania', 'Via delle Rose 1', '3495522123', 0, 0); 
insert into CLIENTE(CITTA, INDIRIZZO, TELEFONO, N_SITI, SPESA_TOTALE) values('Roma', 'Via Marco Polo 21', '3382818092', 0, 0);
insert into CLIENTE(CITTA, INDIRIZZO, TELEFONO, N_SITI, SPESA_TOTALE) values('Catania', 'Via degli Ulivi 123', '3488899123', 0, 0);
insert into CLIENTE(CITTA, INDIRIZZO, TELEFONO, N_SITI, SPESA_TOTALE) values('Palermo', 'Viale Andrea Doria 43', '3382819431', 0, 0);


insert into SVILUPPATORE values(00000000000, 'Default', 'Default', '0000000000');
insert into SVILUPPATORE values(11111111111, 'Alessandro', 'Messina', '3499999999');
insert into SVILUPPATORE values(22222222222, 'Antonio', 'Messina', '3433444444');
insert into SVILUPPATORE values(33333333333, 'Alberto', 'Messina', '3487878999');
insert into SVILUPPATORE values(44444444444, 'Michele', 'Grasso', '3364444882');
insert into SVILUPPATORE values(55555555555, 'Antonio', 'LaMacchia', '3387789621');

insert into CODICEUTENTE values('alessandro95');
insert into CODICEUTENTE values('abcde123456s');
insert into CODICEUTENTE values('edcrf4567891');
insert into CODICEUTENTE values('1ihasd18456s');
insert into CODICEUTENTE values('asd61w354das');
insert into CODICEUTENTE values('grs684asdf12');

insert into UTENTE values('RosaG22', 'GrassoSeiUnCampione3', 'Rosa', 'Grasso', 'RosaGrasso3@hotmail.it', 3, '3495522123');	-- cliente 1
insert into UTENTE values('Marco55', 'Ciaoone95s1', 'Marco', 'Polo', 'marcopolo@virgilio.it', 3, '3382818092');			-- cliente 2
insert into UTENTE values('MichiM1', 'ComeTichiami201', 'Michele', 'Durso', 'Magico22@hotmail.com', 3, '3488899123');	    -- cliente 3
insert into UTENTE values('Grasso96', 'MicheleGrasso96', 'Michele', 'Grasso', 'micheleGrasso@hotmail.com', 3, '3382819431');	-- cliente 4
insert into UTENTE values('Alex95', 'Lollol95', 'Alessandro', 'Messina', 'alessandro95@hotmail.it', 2, '3499999999');	-- sviluppatore 1
insert into UTENTE values('Anto69', 'AntonioseiUnGrande69', 'Antonio', 'Messina', 'antomess69@virgilio.com', 3, '3433444444');	-- sviluppatore 2
insert into UTENTE values('AlbertoFifty3', 'AlbertoCiaoone95', 'Alberto', 'Messina', 'albMessina96@hotmail.com', 3, '3487878999');	-- sviluppatore 3
insert into UTENTE values('MichiG96', 'Michelone96C', 'Michele', 'Grasso', 'micheleGrasso@hotmail.com', 3, '3364444882');	-- sviluppatore 4
insert into UTENTE values('AntoLM', 'AntonioMitico95', 'Antonio', 'LaMacchia', 'antoLamacchia@hotmail.it', 3, '3387789621');	-- sviluppatore 5

insert into MODULO(nome, funzione, costo) values('Modulo1', 'Start', 100);
insert into MODULO(nome, funzione, costo) values('Modulo2', 'Index', 200);
insert into MODULO(nome, funzione, costo) values('Modulo3', 'Control', 300);
insert into MODULO(nome, funzione, costo) values('Modulo4', 'Home', 400);
insert into MODULO(nome, funzione, costo) values('Modulo5', 'Login', 500);
insert into MODULO(nome, funzione, costo) values('Modulo6', 'Pass', 600);
insert into MODULO(nome, funzione, costo) values('Modulo7', 'Chat', 700);
insert into MODULO(nome, funzione, costo) values('Modulo8', 'Game', 800);
insert into MODULO(nome, funzione, costo) values('Modulo9', 'ControlGame', 900);
insert into MODULO(nome, funzione, costo) values('Modulo10', 'Social', 1000);
insert into MODULO(nome, funzione, costo) values('Modulo11', 'Bye', 10);
insert into MODULO(nome, funzione, costo) values('Modulo12', 'LogOut', 20);
insert into MODULO(nome, funzione, costo) values('Modulo13', 'GoodBye', 30);
insert into MODULO(nome, funzione, costo) values('Modulo14', 'Player', 40);
insert into MODULO(nome, funzione, costo) values('Modulo15', 'Viewer', 50);

insert into LAYOUT(costo_totale, sviluppatore) values(0, 11111111111);
insert into LAYOUT(costo_totale, sviluppatore) values(0, 11111111111);
insert into LAYOUT(costo_totale, sviluppatore) values(0, 22222222222);
insert into LAYOUT(costo_totale, sviluppatore) values(0, 33333333333);
insert into LAYOUT(costo_totale, sviluppatore) values(0, 44444444444);
insert into LAYOUT(costo_totale, sviluppatore) values(0, 55555555555);

insert into COMPONENTE values(1, 1);
insert into COMPONENTE values(1, 2);
insert into COMPONENTE values(1, 12);
insert into COMPONENTE values(2, 1);
insert into COMPONENTE values(2, 2);
insert into COMPONENTE values(2, 4);
insert into COMPONENTE values(2, 11);
insert into COMPONENTE values(2, 15);
insert into COMPONENTE values(3, 2);
insert into COMPONENTE values(3, 9);
insert into COMPONENTE values(4, 2);
insert into COMPONENTE values(4, 4);
insert into COMPONENTE values(4, 14);
insert into COMPONENTE values(5, 2);
insert into COMPONENTE values(6, 2);
insert into COMPONENTE values(6, 3);
insert into COMPONENTE values(6, 8);
insert into COMPONENTE values(6, 15);

insert into SITO_WEB(URL, DATA_PUBBLICAZIONE, CLIENTE, LAYOUT) values('www.SitoWeb1.com', current_date(), 1, 1);
insert into SITO_WEB(URL, DATA_PUBBLICAZIONE, CLIENTE, LAYOUT) values('www.SitoWeb2.com', '2014-08-12', 2, 2);
insert into SITO_WEB(URL, DATA_PUBBLICAZIONE, CLIENTE, LAYOUT) values('www.SitoWeb3.com', '2013-08-11', 3, 3);
insert into SITO_WEB(URL, DATA_PUBBLICAZIONE, CLIENTE, LAYOUT) values('www.SitoWeb4.com', '2016-04-08', 4, 4);

insert into VISITATORE values('192.168.9.1', current_date());
insert into VISITATORE values('192.168.9.2', '2017-08-12');
insert into VISITATORE values('192.168.10.3', '2017-03-11');
insert into VISITATORE values('192.168.11.1', '2014-04-04');
insert into VISITATORE values('192.168.13.3', '2016-08-08');
insert into VISITATORE values('192.168.9.5', '2013-11-11');
insert into VISITATORE values('192.168.6.3', '2017-12-12');
insert into VISITATORE values('192.168.5.21', '2015-08-09');

insert into VISITA values('192.168.9.1', current_Date(), 1);
insert into VISITA values('192.168.9.2', '2017-08-12', 1);
insert into VISITA values('192.168.10.3', '2017-03-11', 2);
insert into VISITA values('192.168.11.1', '2014-04-04', 2);
insert into VISITA values('192.168.13.3', '2016-08-08', 2);
insert into VISITA values('192.168.9.5', '2013-11-11', 3);
insert into VISITA values('192.168.6.3', '2017-12-12', 4);
insert into VISITA values('192.168.5.21', '2015-08-09', 4);