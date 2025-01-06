import { useState } from 'react';

interface UseFormProps {
  initialValues: { [key: string]: any };
}

const useForm = ({ initialValues }: UseFormProps) => {
  const [formData, setFormData] = useState(initialValues);

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement | HTMLTextAreaElement>) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const resetForm = () => {
    setFormData(initialValues);
  };

  return { formData, setFormData, handleChange, resetForm };
};

export default useForm;
