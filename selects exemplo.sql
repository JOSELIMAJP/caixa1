SELECT movimentos_evento_d,SUM(movimentos_valor) FROM movimentos WHERE movimentos_evento_d like ('%') and movimentos_data BETWEEN '03/10/2020' and '03/10/2020'



SELECT movimentos_evento_d,SUM(movimentos_valor)
FROM movimentos WHERE movimentos_evento_d like ('%') 
and movimentos_data BETWEEN '2020-10-01' and '2021-10-01'


SELECT movimentos_evento_d as descricao,
           SUM(movimentos_valor) as saldo
FROM movimentos 
WHERE movimentos_evento_d like ('Banco-Transferencia') 
and movimentos_data BETWEEN '2020-10-01' and '2020-10-03'
GROUP BY movimentos_evento_d
UNION ALL
SELECT movimentos_evento_d as descricao,
           SUM(movimentos_valor) as saldo
FROM movimentos 
WHERE movimentos_evento_c like ('Banco-Transferencia') 
and movimentos_data BETWEEN '2020-10-01' and '2020-10-03'
GROUP BY movimentos_evento_c



-----------------


create database exercicio;

use exercicio;

# Item 1

delimiter $$




create function fparac(tf decimal(5,2))
returns decimal(5,2)
begin
    return (tf-32)/1.8;
end $$








# Item 2

create function vol_esfera(raio decimal(5,2))
returns decimal(5,2)
begin
	return (4/3)*3.14*pow(raio,3);
end $$

# Item 3

create function saudacao(nome varchar(200))
returns varchar(200)
begin
	return concat("OlÃ¡ ",nome);
end $$

# Item 4

CREATE TABLE cliente(nome VARCHAR(200),
             telefone DECIMAL(11))$$

insert into cliente values ('Ana',88889999)$$
insert into cliente values ('Beto',99991234)$$
insert into cliente values ('Caio',8399994321)$$
insert into cliente values ('Daniel',32251234)$$


create procedure atualiza_nono_digito()
begin 
  UPDATE cliente SET telefone=concat('9',telefone)
  WHERE length(telefone)=8 and 
      substr(telefone, 1, 1) between 5 and 9;

  UPDATE cliente SET telefone=concat(substr(telefone, 1, 2),'9',substr(telefone, 3, 8))
    WHERE length(telefone)=10 and 
    substr(telefone, 3, 1) between 5 and 9;
end $$


# Testes

delimiter ;

# Teste do Item 1
select fparac(18);

# Teste do Item 2
select vol_esfera(5);

# Teste do Item 3
select saudacao('Juliana');

# Teste do Item 4
select * from cliente;
call atualiza_nono_digito();
select * from cliente;




-----------------------------------------------

SELECT movimentos_evento_d,SUM(movimentos_db) as Debito
FROM movimentos WHERE movimentos_evento_d like ('%') and movimentos_data BETWEEN '2020-10-01' and '2020-10-03'




-----------------------------------------------

SELECT SUM(movimentos_db) as Debito FROM movimentos WHERE movimentos_evento_c like ('Banco-Transferencia') and movimentos_data BETWEEN '2020-10-01' and '2020-10-03'

-(SELECT SUM(movimentos_db) as Debito FROM movimentos WHERE movimentos_evento_c like ('Banco-Transferencia') and movimentos_data BETWEEN '2020-10-01' and '2020-10-03')



-------------------

SELECT SUM(movimentos_db) as Debito FROM movimentos WHERE movimentos_evento_d like ('Banco-Transferencia') and movimentos_data BETWEEN '2020-10-01' and '2020-10-03'



-------------------

	SELECT SUM(movimentos_db) as Debito FROM movimentos WHERE movimentos_evento_d = 'Banco-Transferencia' and movimentos_data BETWEEN '2020-10-01' and '2020-10-03'


--------------------

SELECT SUM(movimentos_db-movimentos_cr) as Saldo FROM movimentos WHERE movimentos_evento_d = 'Banco-Transferencia' and movimentos_data BETWEEN '2020-10-01' and '2020-10-03'


--------------------

SELECT `movimentos_evento`, SUM(movimentos_db-movimentos_cr) as Saldo FROM movimentos_saldo group by `movimentos_evento`


