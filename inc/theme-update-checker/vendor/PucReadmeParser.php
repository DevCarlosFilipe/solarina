<?php

class PucReadmeParser {
    public function parse_readme_contents($contents) {
        $result = [
            'sections' => [],
            'stable_tag' => '',
        ];

        $lines = preg_split('/\r\n|\r|\n/', $contents);
        $currentSection = null;

        foreach ($lines as $line) {
            $trimmed = trim($line);

            if (preg_match('/^Stable tag:\s*(.+)$/i', $trimmed, $matches)) {
                $result['stable_tag'] = trim($matches[1]);
            }

            if (preg_match('/^=+\s*(.+?)\s*=+$/', $trimmed, $matches)) {
                $currentSection = strtolower(trim($matches[1]));
                $result['sections'][$currentSection] = '';
                continue;
            }

            if ($currentSection !== null) {
                $result['sections'][$currentSection] .= $line . "\n";
            }
        }

        return $result;
    }
}
