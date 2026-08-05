SELECT p.vltotal AS valorTotal, c.A1_NOME AS clientes, c.A1_COD, COUNT(p.codipedi) 'QTD_PEDIDOS'
FROM clientes c JOIN pedidos p ON (p.C5_CLIENTE=c.A1_COD)
WHERE A1_COD = 290
ORDER BY c.A1_NOME ASC;
