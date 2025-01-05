import React from 'react';
import styles from './UiSelectBox.module.scss';

// プロップの型定義
interface UiSelectBoxProps {
  name: string;
  value: string;
  onChange: (e: React.ChangeEvent<HTMLSelectElement>) => void;
  options: {
    id: string | number; // string型も許容する
    name: string;
  }[];
  canNull: boolean;
  placeholder: string;
}

const UiSelectBox: React.FC<UiSelectBoxProps> = ({
  name,
  value,
  onChange,
  options,
  canNull,
  placeholder = '選択してください', // デフォルトのプレースホルダー
}) => {
  return (
    <div className={styles.selectBoxContainer}>
      <select
        name={name}
        value={value}
        onChange={onChange}
        className={styles.formControl}
      >
        {canNull && <option value="">{placeholder}</option>}
        {options.map((option) => (
          <option key={option.id} value={option.id}>
            {option.name}
          </option>
        ))}
      </select>
    </div>
  );
};

export default UiSelectBox;
