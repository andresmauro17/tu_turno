use tuturno;

SELECT 
	m.id as m_id, m.name as m_name,
    dmt.id as dmt_id, dmt.diligence_id, dmt.time_atention,dmt.end_atention, dmt.created_at,
    t.id as turn_id, t.consecutive_string
FROM modules AS m
left join diligences_modules_turns AS dmt ON m.id = dmt.module_id
join turns as t ON dmt.turn_id = t.id
where m.is_active = 1 and (dmt.time_atention IS null AND dmt.end_atention IS null or (dmt.end_atention IS null))
order by m.id
;