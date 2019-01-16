SELECT *,SUM(rep) as numrep FROM(

  SELECT *,COUNT(*) as 'rep' FROM user_tabla
  WHERE nombre LIKE '%yoshio%' OR nombre LIKE '%lolo%' OR nombre LIKE '%caca%'
  group by id

  UNION ALL

  SELECT *,COUNT(*) as 'rep' FROM user_tabla
  WHERE posicion LIKE '%yoshio%' OR posicion LIKE '%lolo%' OR posicion LIKE '%caca%'
  group by id

  UNION ALL

  SELECT *,COUNT(*) as 'rep' FROM user_tabla
  WHERE ano_inicio LIKE '%yoshio%' OR ano_inicio LIKE '%lolo%' OR ano_inicio LIKE '%caca%'
  group by id

  UNION ALL

  SELECT *,COUNT(*) as 'rep' FROM user_tabla
  WHERE detalles LIKE '%yoshio%' OR detalles LIKE '%lolo%' OR detalles LIKE '%caca%'
  group by id

)as tb
GROUP BY id ORDER BY numrep DESC
---------------------------------------------------------------------------------------------------
SELECT *,SUM(rep) as numrep FROM (

  SELECT *, COUNT(*) as 'rep' FROM user_tabla
  WHERE nombre LIKE '%yosh%' OR nombre LIKE '%kiy%' OR nombre LIKE '%sug%'
  group by id

  UNION ALL

  SELECT *, COUNT(*) as 'rep' FROM user_tabla
  WHERE posicion LIKE '%yosh%' OR posicion LIKE '%kiy%' OR posicion LIKE '%sug%'
  group by id

  UNION ALL

  SELECT *, COUNT(*) as 'rep' FROM user_tabla
  WHERE ano_inicio LIKE '%yosh%' OR ano_inicio LIKE '%kiy%' OR ano_inicio LIKE '%sug%'
  group by id

  UNION ALL

  SELECT *, COUNT(*) as 'rep' FROM user_tabla
  WHERE detalles LIKE '%yosh%' OR detalles LIKE '%kiy%' OR detalles LIKE '%sug%'
  group by id
) as tb
GROUP BY id
ORDER BY numrep DESC
