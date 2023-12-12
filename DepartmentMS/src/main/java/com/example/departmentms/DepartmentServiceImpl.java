package com.example.departmentms;


import lombok.AllArgsConstructor;
import lombok.RequiredArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@AllArgsConstructor
public class DepartmentServiceImpl implements IDepartmentService {

    DepartmentRepository departmentRepository;
    @Override
    public Department addDepartment(Department department) {
        return departmentRepository.save(department);
    }

    @Override
    public Department getDepartment(long idDepartment) {
        return departmentRepository.findById(idDepartment).orElse(null);
    }

    @Override
    public List<Department> getAllDepartments() {
        return departmentRepository.findAll();
    }

    @Override
    public void deleteDepartment(long idDepartment) {
             departmentRepository.deleteById(idDepartment);
    }

    @Override
    public Department updateDepartment(Department department) {
        Department dep = departmentRepository.findById(department.getIdDepartment()).orElse(null);
      //  Universite universite = universiteRepository.findById(dep.getUniversite().getIdUniversite()).orElse(null);
        if (dep != null){
           // department.setUniversite(universite);
            return departmentRepository.save(department);
        }else {
            return department;
        }

    }





    @Override
    public List<Department> getDepartmentsByNom(String nom) {
        return departmentRepository.findDepartmentsByNomDepartment(nom);
    }

    @Override
    public Long statNumberofdepartments() {
        return departmentRepository.count();
    }

    @Override
    public List<Department> getDepartmentsOrderByEtage() {
        return departmentRepository.orderDepartmentsetage();
    }

    @Override
    public List<Department> getDepartmentsOrderByClasses() {
        return departmentRepository.orderClasses();
    }


}
