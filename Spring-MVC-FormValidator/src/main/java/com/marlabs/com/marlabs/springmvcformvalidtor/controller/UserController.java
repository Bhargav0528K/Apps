package com.marlabs.com.marlabs.springmvcformvalidtor.controller;

import java.util.Locale;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.WebDataBinder;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.InitBinder;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

import com.marlabs.com.marlabs.springmvcformvalidtor.beanclass.User;
import com.marlabs.com.marlabs.springmvcformvalidtor.validator.UserValidator;

/**
 * @author Bhargava Reddy
 *
 */

@Controller
public class UserController {
	@Autowired
	private UserValidator userValidator;

	/**
	 * @param binder
	 * 
	 */
	@InitBinder
	protected void initBinder(WebDataBinder binder) {
		binder.addValidators(userValidator);

	}

	/**
	 * @param locale
	 * @param model
	 * @return responsePage
	 */
	@GetMapping("/user")
	public String userForm(Locale locale, Model model) {
		String responsePage = "";
		model.addAttribute("user", new User());
		responsePage = "userForm";
		return responsePage;

	}

	/**
	 * @param user
	 * @param result
	 * @param model
	 * @return responsePage
	 */
	@PostMapping("/saveUser")
	public String saveUser(@ModelAttribute("user") @Validated User user, BindingResult result, Model model) {
		String responsePage = "";
		if (result.hasErrors()) {
			responsePage = "userForm";
		} else {
			responsePage = "success";
		}
		return responsePage;

	}

}
