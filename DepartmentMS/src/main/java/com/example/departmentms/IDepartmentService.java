package com.example.departmentms;




import java.util.List;

public interface IDepartmentService {

    // CRUD
    Department addDepartment(Department department);

    Department getDepartment(long idDepartment);

    List<Department> getAllDepartments();

    void deleteDepartment(long idDepartment);

    Department updateDepartment(Department department);



    // Avancéé


     List<Department> getDepartmentsByNom(String nom);

    Long statNumberofdepartments();

    List<Department> getDepartmentsOrderByEtage();

    List<Department> getDepartmentsOrderByClasses();





}
