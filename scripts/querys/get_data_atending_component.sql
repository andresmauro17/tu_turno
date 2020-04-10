use tuturno;

SELECT 
	t.id as turn_id, t.end_atention, t.is_active, t.created_at as printed_at, t.service_id, t.consecutive_string,
    dmt.diligence_id, dmt.module_id, dmt.time_atention, dmt.end_atention    
FROM turns AS t
join diligences_modules_turns AS dmt ON dmt.turn_id = t.id
where 
    t.is_active = 1
    AND dmt.diligence_id = 1 
    and (dmt.module_id = 4 or dmt.module_id is null)
order by t.id
;