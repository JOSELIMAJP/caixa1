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