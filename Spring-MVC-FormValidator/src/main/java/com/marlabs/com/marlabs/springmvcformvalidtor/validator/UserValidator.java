package com.marlabs.com.marlabs.springmvcformvalidtor.validator;

import java.util.regex.Pattern;

import org.springframework.stereotype.Component;
import org.springframework.validation.Errors;
import org.springframework.validation.ValidationUtils;
import org.springframework.validation.Validator;

import com.marlabs.com.marlabs.springmvcformvalidtor.beanclass.User;

/**
 * @author Bhargava Reddy
 *
 */
@Component
public class UserValidator implements Validator {

	public boolean supports(Class<?> claz) {
		return User.class.equals(claz);
	}

	public void validate(Object obj, Errors error) {
		ValidationUtils.rejectIfEmpty(error, "userName", "user.userName.empty");
		ValidationUtils.rejectIfEmpty(error, "email", "user.email.empty");
		ValidationUtils.rejectIfEmpty(error, "password", "user.password.empty");
		ValidationUtils.rejectIfEmpty(error, "gender", "user.gender.empty");
		ValidationUtils.rejectIfEmpty(error, "contactNumber", "user.contactNumber.empty");
		User user = (User) obj;

		Pattern pattern = Pattern.compile("[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,6}$",
				Pattern.CASE_INSENSITIVE);
		if (!(pattern.matcher(user.getEmail()).matches())) {
			error.rejectValue("email", "user.email.invalid");
		}
		pattern = Pattern.compile("((?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[*@#$%]).{6,20})");
		if (!(pattern.matcher(user.getPassword()).matches())) {
			error.rejectValue("password", "user.password.invalid");
		}
		pattern = Pattern.compile("\\d{3}-\\d{3}-\\d{4}");
		if (!(pattern.matcher(user.getContactNumber()).matches())) {
			error.rejectValue("contactNumber", "user.contactNumber.invalid");
		}

		// Pattern pattern2 = Pattern.compile("d{3}-d{3}-d{4}$");
		// if (!(pattern2.matcher(user.getContactNumber()).matches())) {
		// error.rejectValue("contactNumber", "user.contactNumber.invalid");
		// }

	}

}
