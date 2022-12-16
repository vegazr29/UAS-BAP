CREATE VIEW vkaryawan AS
SELECT emp.name,emp.identification_no,emp.address,emp.marriage_status,emp.gender,pys.deduction,pys.bonus,pys.payslip_amount
       FROM employees emp 
    INNER JOIN payslips pys ON pys.contract_id=emp.contract_id