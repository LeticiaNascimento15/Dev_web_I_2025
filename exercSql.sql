11 SELECT DISTINCT c.nome
FROM fornecedor f
INNER JOIN cidade c ON f.cidade_id=c.id
ORDER BY c.nome;

12 SELECT p.nome as produto, f.nome as fornecedor, tp.descricao as tipo_produto
FROM produto p
INNER JOIN fornecedor f ON p.fornecedor_id=f.id
INNER JOIN tipo_produto tp ON tp.id = p.tipo_produto_id
WHERE p.estoque > 100
  AND p.preco_custo < 50;

13 SELECT f.nome
FROM fornecedor f
WHERE f.nome LIKE '%LAB%'
   OR f.nome LIKE '%FAR%';

14 SELECT p.nome as produtos, pv. quantidade, c.nome as clientes, DATE_FORMAT(v.datavenda, '%dd/%mm/%yy') as data_venda
FROM venda v
INNER JOIN produto p ON p.id= v.id_produto
INNER JOIN cliente c ON c.id_cliente = v.id_cliente;

SELECT p.descricao, v.quantidade, c.nome, DATE_FORMAT(v.data_venda, '%d/%m/%aaaa') AS data_venda
FROM venda v
INNER JOIN produto p ON p.produto_id = p.id
INNER JOIN venda v ON pv.venad_id = v.id
INNER JOIN cliente c ON v.cliente_id=c.id;

15
SELECT p.nome, p.pcusto
FROM produto p
ORDER BY p.pcusto DESC
LIMIT 5,15;

16 SELECT c.nome as cliente, u.sigla as uf, v.nome as vendedor, c.limite_credito
FROM cliente c
INNER JOIN vendedor v ON c.vendedor_id = v.id
INNER JOIN bairro b ON c.id= b.cidade_id
INNER JOIN cidade ci ON b.cidade_id= ci.id
INNER JOIN uf u ON ci.uf_id= u.id
WHERE c.limite_credito > 5000;

17 SELECT p.nome AS produtos, u.sigla AS uf
FROM produto p
INNER JOIN fornecedor f ON p.fornecedor_id=f.id
INNER JOIN cidade ci ON f.cidade_id=ci.id
INNER JOIN uf u ON ci.uf_id=u.id
WHERE u.sigla = 'MG';

18 SELECT c.nome AS clientes, ci.nome AS cidade, FORMAT(vd.valor_total*ve.comissao_percentual/100, 2) AS comissao
FROM venda vd
INNER JOIN cliente c ON vd.cliente_id=c.id
INNER JOIN vendedor ve ON c.vendedor_id=ve.id
INNER JOIN bairro b ON c.bairro_id=b.id
INNER JOIN cidade ci ON b.cidade_id=ci.id
WHERE YEAR(vd.datavenda) = 2006 AND (vd.datavenda*ve.comissao_percentual/100) > 200;

19 SELECT p.nome AS produto,
    c.nome AS cliente,
    u.sigla AS uf
FROM produto_vendido pv
INNER JOIN produto p ON pv.produto_id = p.id
INNER JOIN venda v ON pv.venda_id = v.id
INNER JOIN cliente c ON v.cliente_id = c.id
INNER JOIN bairro b ON c.bairro_id = b.id
INNER JOIN cidade cid ON b.cidade_id = cid.id
INNER JOIN uf u ON cid.uf_id = u.id
WHERE u.sigla = 'RJ';

20 SELECT 
    l.id AS numero_lote,
    l.qtde AS quantidade,
    tp.descricao,
    f.nome AS fornecedor
FROM lote l
INNER JOIN produto p ON l.produto_id = p.id
INNER JOIN tipo_produto p ON p.tipo_produto_id = tp.id
INNER JOIN fornecedor f ON p.fornecedor_id = f.id
WHERE l.qtde > 50;

21 SELECT DATE_FORMAT(vd.datavenda, '%dd/%mm/%aaaa') as data_venda, c.nome AS cliente, ve.nome AS vendedor, u.sigla AS uf
FROM venda vd
INNER JOIN cliente c ON vd.cliente_id = c.id
INNER JOIN vendedor ve ON c.vendedor_id= ve.id
INNER JOIN bairro b ON c.bairro_id = b.id
INNER JOIN cidade ci ON b.cidade_id= ci.id
INNER JOIN uf u ON ci.uf_id= u.id
WHERE u.sigla = 'RJ' OR u.sigla='MG';

22 SELECT DISTINCT ve.vendedor
FROM venda d
INNER JOIN cliente c ON vd.cliente_ id= c.id
INNER JOIN vendedor ve ON c.vendedor_id = ve.id
INNER JOIN bairro b ON c.bairro_id = b.id
INNER JOIN cidade ci ON b.cidade_id= ci.id
INNER JOIN uf u ON ci.uf_id= u.id
WHERE (u.sigla= 'RJ' OR u.sigla='ES' OR u.sigla='SP') AND valor_total > SELECT AVG(vd2.valor_total)
FROM venda vd2
INNER JOIN cliente c2 ON vd2.cliente_id = c2.id
INNER JOIN bairro b2 ON c2.bairro_id = b2.id
INNER JOIN cidade ci2 ON b2.cidade_id= ci2.id
INNER JOIN uf u2 ON ci2.uf_id= u2.id
WHERE u2.sigla = u.sigla);

23 SELECT f.nome AS fornecedor, p.nome AS produto
FROM fornecedor f
LEFT JOIN produto p ON  p.fornecedor_id=f.id;

24 SELECT c.nome AS cliente, b.bairro AS bairro, ci.cidade AS cidade, u.uf AS uf, vd.valor_total AS valor, DATE_FORMAT(vd.datavenda, '%dd/%mm/%aaaa') AS data_venda
FROM cliente c
INNER JOIN bairro b ON c.bairro_id=b.id
INNER JOIN cidade ci ON b.cidade_id= ci.id
INNER JOIN uf f ON ci.uf_id= u.id
LEFT JOIN venda vd ON v.cliente_i= c.id AND YEAR(vd.datavenda) = 2006
WHERE u.sigla='MG' OR u.sigla='RJ OR u.sigla='ES';

25 SELECT c.nome AS cliente, b.bairro AS bairro, ci.cidade AS cidade, u.uf AS uf, vd.valor_total AS valor, DATE_FORMAT(vd.datavenda, '%dd/%mm/%aaaa') AS data_venda
FROM  cliente c
INNER JOIN bairro b ON c.bairro_id=b.id
INNER JOIN cidade ci ON b.cidade_id=ci.id
INNER JOIN uf u ON ci.uf_id= u.id
LEFT JOIN venda vd ON vd.cliente_id=c.id AND YEAR(vd.datavenda)=2006 AND vd.valor_total>100
WHERE u.sigla='MG' OR u.sigla='RJ' OR u.sigla='ES';
