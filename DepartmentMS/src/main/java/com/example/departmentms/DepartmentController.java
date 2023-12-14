package com.example.departmentms;


import lombok.AllArgsConstructor;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/departments")
@AllArgsConstructor
public class DepartmentController {

    IDepartmentService departmentService;


    @PostMapping("/addDepartment")
    Department addDepartment(@RequestBody Department department){
        return departmentService.addDepartment(department);
    }

    @GetMapping("/Department/{id}")
    Department retriveDepartment(@PathVariable long id){
        return departmentService.getDepartment(id);
    }

    @GetMapping("/department")
    List<Department> retriveDepartments(){
        return departmentService.getAllDepartments();
    }

    @DeleteMapping("/deleteDepartment/{id}")
    void deleteDepartment(@PathVariable long id){
        departmentService.deleteDepartment(id);
    }

    @PutMapping("/updateDepartment")
    Department updateDepartment(@RequestBody Department department){
        return departmentService.updateDepartment(department);
    }





    @GetMapping("/department/{nom}")
    List<Department> getDepartmentsByNom(@PathVariable String nom){
        return departmentService.getDepartmentsByNom(nom);
    }

    @GetMapping("/countdepartment")
    Long statNumberofdepartments(){
        return departmentService.statNumberofdepartments();
    }

    @GetMapping("/DepartmentOrderEtage")
    List<Department> getDepartmentsOrderByEtage(){
        return departmentService.getDepartmentsOrderByEtage();
    }

    @GetMapping("/DepartmentOrderClasses")
    List<Department> getDepartmentsOrderByClasses(){
        return departmentService.getDepartmentsOrderByClasses();
    }



}
